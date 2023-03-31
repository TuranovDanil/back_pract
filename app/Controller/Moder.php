<?php

namespace Controller;

use Model\Division;
use Model\Position;
use Model\Type;
use Src\Request;
use Model\Discipline;
use Model\User;
use Model\WorkerDiscipline;
use Src\Validator\Validator;
use Src\View;

class Moder
{

    public function moder(Request $request): string
    {
        $users = User::all();
        $discipline = Discipline::all();
        $types = Type::all();
        if ($request->method === 'POST' && WorkerDiscipline::create($request->all())){
            app()->route->redirect('/workers');
        }
        if ($request->method === 'POST' && Division::create($request->all())){
            app()->route->redirect('/workers');
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
            if ($validator->fails()) {
                app()->route->redirect('/moder');
                return new View('site.moder',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            if (Discipline::create($request->all())) {
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
