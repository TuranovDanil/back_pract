<?php

namespace Controller;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Capsule\Manager;

//use Illuminate\Support\Facades\DB;
use Model\Post;
use Model\WorkerDiscipline;
use Src\Validator\Validator;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Model\Discipline;
use Model\Division;
use Model\Position;
use Model\Sex;
use Symfony\Component\Console\Input\Input;

class Disciplines
{
    public function discipline(Request $request): string
    {
        $data = $request->all();
        $divisions = Division::all();
        $discipline = Discipline::all();
        if (isset($data["filter"]) && isset($data["search"]) && $data["search"] != "") {
            $discipline = DB::table('disciplines')
                ->join('worker_disciplines', 'disciplines.id', '=', 'worker_disciplines.id_discipline')
                ->join('users', 'worker_disciplines.id_worker', '=', 'users.id')
                ->join('divisions', 'users.id_division', '=', 'divisions.id')
                ->select('disciplines.*')->whereIn('divisions.id', $data["filter"])
                ->where('users.name', '=', $data["search"])->get();
        } else if (isset($data["filter"])) {
            $discipline = DB::table('disciplines')
                ->join('worker_disciplines', 'disciplines.id', '=', 'worker_disciplines.id_discipline')
                ->join('users', 'worker_disciplines.id_worker', '=', 'users.id')
                ->join('divisions', 'users.id_division', '=', 'divisions.id')
                ->select('disciplines.*')->whereIn('divisions.id', $data["filter"])->get();
        } else if (isset($data["search"]) && $data["search"] != "") {
            $discipline = DB::table('disciplines')
                ->join('worker_disciplines', 'disciplines.id', '=', 'worker_disciplines.id_discipline')
                ->join('users', 'worker_disciplines.id_worker', '=', 'users.id')
                ->select('disciplines.*')->where('users.name', '=', $data["search"])->get();
        }


        return new View('site.discipline', ['discipline' => $discipline, 'divisions' => $divisions]);
    }

    public function dis($id, Request $request): string
    {
        $dis = Discipline::query()->find($id);
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
            ]);
            if ($validator->fails()) {
                return new View('site.dis',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'dis' => $dis]);
            } else {
                $data = $request->all();
                $dis->name = $data['name'];

                $dis->save();
                app()->route->redirect('/discipline');
            }
        }
        return new View('site.dis', ['dis' => $dis]);
    }

    public function disDelete($id): string
    {
        Discipline::find($id)->delete();
        app()->route->redirect('/discipline');
    }

}
