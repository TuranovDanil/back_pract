<?php

namespace Controller;

use Illuminate\Database\Capsule\Manager as DB;
use Model\Division;
use Model\Position;
use Model\Type;
use Src\FileUploader;
use Src\Request;
use Model\Discipline;
use Model\User;
use Model\WorkerDiscipline;
use Src\Validator\Validator;
use Src\View;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Moder
{

    public function moder(Request $request): string
    {
        $users = User::all();
        $discipline = Discipline::all();
        $types = Type::all();
        if ($request->method === 'POST' && WorkerDiscipline::create($request->all())) {
            app()->route->redirect('/discipline');
        }
        if ($request->method === 'POST' && Division::create($request->all())) {
            app()->route->redirect('/discipline');
        }
        return new View('site.moder', ['users' => $users, 'discipline' => $discipline, 'types' => $types]);
    }

    public function addDiscipline(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
            ], [
                'required' => 'Поле :field пусто'
            ]);
            $fileUploader = new FileUploader($_FILES['image']);

            $destination = 'uploads';
            $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            //Макс размер в битах, 2.5Мб в данный момент
            $maxSize = 20971520;

            $newFileName = $fileUploader->upload($destination, $allowedTypes, $maxSize);
            if ($validator->fails() || is_array($newFileName)) {
                app()->route->redirect('/moder');
                return new View('site.moder',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            } else {
                DB::table('disciplines')->insert([
                    'name' => $_POST['name'],
                    'image' => $destination . '/' . $newFileName,
                ]);
                app()->route->redirect('/discipline');
            }

        }
        return (new View('site.moder'));
    }

    public function addDivision(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'id_type' => ['required']
            ], [
                'required' => 'Поле :field пусто'
            ]);
            if ($validator->fails()) {
                app()->route->redirect('/moder');
                return new View('site.moder',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            if (Division::create($request->all())) {
                app()->route->redirect('/discipline');
            }
        }
        return (new View('site.moder'));
    }

    public function addType(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
            ], [
                'required' => 'Поле :field пусто'
            ]);
            if ($validator->fails()) {
                app()->route->redirect('/moder');
                return new View('site.moder',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            if (Type::create($request->all())) {
                app()->route->redirect('/moder');
            }
        }
        return (new View('site.moder'));
    }

    public function addPosition(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
            ], [
                'required' => 'Поле :field пусто'
            ]);
            if ($validator->fails()) {
                app()->route->redirect('/moder');
                return new View('site.moder',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            if (Position::create($request->all())) {
                app()->route->redirect('/signup');
            }
        }
        return (new View('site.moder'));
    }

}
