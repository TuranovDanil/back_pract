<?php

namespace Controller;

use Model\Division;
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
        if ($request->method === 'POST' && WorkerDiscipline::create($request->all())){
            app()->route->redirect('/workers');
        }
        if ($request->method === 'POST' && Division::create($request->all())){
            app()->route->redirect('/workers');
        }
        return new View('site.moder', ['users' => $users, 'discipline' => $discipline]);
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
                return new View('site.moder',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            if (Discipline::create($request->all())) {
                app()->route->redirect('/discipline');
            }

        }
        return (new View())->render('site.moder');
    }
}
