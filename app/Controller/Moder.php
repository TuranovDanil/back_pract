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
use Intervention\Image\Facades\Image;

class Moder
{

    public function moder(Request $request): string
    {
        $users = User::all();
        $discipline = Discipline::all();
        $types = Type::all();
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'id_worker' => ['rowUnique:worker_disciplines,id_worker,id_discipline'],

            ], [
                'rowUnique' => 'Строка :field должна быть уникальной'
            ]);
            if ($validator->fails()) {
                return new View('site.moder',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'users' => $users, 'discipline' => $discipline, 'types' => $types]);
            }
            if (WorkerDiscipline::create($request->all())) {
                app()->route->redirect('/discipline');
            }
        }
        return new View('site.moder', ['users' => $users, 'discipline' => $discipline, 'types' => $types]);
    }

    public function addDiscipline(Request $request): string
    {
        $users = User::all();
        $discipline = Discipline::all();
        $types = Type::all();
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'image' => ['fileSize', 'fileType'],
            ], [
                'required' => 'Поле :field пусто',
                'fileSize' => 'Поле :field слишком большой',
                'fileType' => 'Поле :field формат файла не подходит'
            ]);
            $fileUploader = new FileUploader($_FILES['image']);

            $destination = 'uploads';

            $newFileName = $fileUploader->upload($destination);
            if ($validator->fails() || is_array($newFileName)) {
                return new View('site.moder',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'users' => $users, 'discipline' => $discipline, 'types' => $types]);
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
        $users = User::all();
        $discipline = Discipline::all();
        $types = Type::all();
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'id_type' => ['required']
            ], [
                'required' => 'Поле :field пусто'
            ]);
            if ($validator->fails()) {
                return new View('site.moder',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'users' => $users, 'discipline' => $discipline, 'types' => $types]);
            }
            if (Division::create($request->all())) {
                app()->route->redirect('/discipline');
            }
        }
        return (new View('site.moder'));
    }

    public function addType(Request $request): string
    {
        $users = User::all();
        $discipline = Discipline::all();
        $types = Type::all();
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
            ], [
                'required' => 'Поле :field пусто'
            ]);
            if ($validator->fails()) {
                return new View('site.moder',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'users' => $users, 'discipline' => $discipline, 'types' => $types]);
            }
            if (Type::create($request->all())) {
                app()->route->redirect('/moder');
            }
        }
        return (new View('site.moder'));
    }

    public function addPosition(Request $request): string
    {
        $users = User::all();
        $discipline = Discipline::all();
        $types = Type::all();
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
            ], [
                'required' => 'Поле :field пусто'
            ]);
            if ($validator->fails()) {
                return new View('site.moder',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'users' => $users, 'discipline' => $discipline, 'types' => $types]);
            }
            if (Position::create($request->all())) {
                app()->route->redirect('/signup');
            }
        }
        return (new View('site.moder'));
    }

}
