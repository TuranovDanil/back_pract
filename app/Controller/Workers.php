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

class Workers
{
    public function workers(Request $request): string
    {

        $data = $request->all();
        $divisions = Division::all();
        $users = User::all();

        if (isset($data["filter"])) {
            $users = DB::table('users')
                ->join('divisions', 'users.id_division', '=', 'divisions.id')
                ->select('users.*')->whereIn('divisions.id', $data["filter"])->get();

        }
        return new View('site.workers', ['divisions' => $divisions, 'users' => $users]);
    }


    public function worker($id, Request $request): string
    {
        $user = User::query()->find($id);
        $divisions = Division::all();
        $positions = Position::all();
        $sexes = Sex::all();
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'surname' => ['required'],
                'id_position' => ['required'],
                'id_division' => ['required'],
                'role' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);
            if ($validator->fails()) {
                return new View('site.worker',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'user' => $user, 'positions' => $positions, 'divisions' => $divisions, 'sexes' => $sexes]);
            } else {
                $data = $request->all();
                $user->name = $data['name'];
                $user->surname = $data['surname'];
                $user->id_position = $data['id_position'];
                $user->id_division= $data['id_division'];
                $user->role = $data['role'];
                $user->save();
                app()->route->redirect('/workers');
            }
        }
        return new View('site.worker', ['user' => $user, 'positions' => $positions, 'divisions' => $divisions, 'sexes' => $sexes]);
    }

    public function workerDelete($id): string
    {
        User::find($id)->delete();
        app()->route->redirect('/workers');
    }

}
