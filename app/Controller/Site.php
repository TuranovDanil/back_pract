<?php

namespace Controller;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Capsule\Manager;

//use Illuminate\Support\Facades\DB;
use Model\Post;
use Model\WorkerDiscipline;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Model\Discipline;
use Model\Division;
use Model\Position;
use Model\Sex;
use Symfony\Component\Console\Input\Input;

class Site
{
    public function discipline(Request $request): string
    {
        $divisions = Division::all();
        $discipline = Discipline::all();
        return new View('site.discipline', ['discipline' => $discipline, 'divisions' => $divisions]);
    }

    public function filterDiscipline(Request $request): string
    {
        $filter = $request->filter;
        $divisions = Division::all();
        $discipline = DB::table('disciplines')
            ->join('worker_disciplines', 'disciplines.id', '=', 'worker_disciplines.id_discipline')
            ->join('users', 'worker_disciplines.id_worker', '=', 'users.id')
            ->join('divisions', 'users.id_division', '=', 'divisions.id')
            ->select('disciplines.*')->whereIn('divisions.id', $filter)->get();
        return new View('site.discipline', ['discipline' => $discipline, 'divisions' => $divisions]);
    }

    public function search(Request $request)
    {
        $divisions = Division::all();
        $search = $request->search;
        $discipline = DB::table('disciplines')
            ->join('worker_disciplines', 'disciplines.id', '=', 'worker_disciplines.id_discipline')
            ->join('users', 'worker_disciplines.id_worker', '=', 'users.id')
            ->select('disciplines.*')->where('users.name', '=', $search)->get();
        return new View('site.discipline', ['discipline' => $discipline, 'divisions' => $divisions]);

    }

    public function workers(Request $request): string
    {
//        $users = User::all();
//        $divisions = Division::all();
//        return new View('site.workers', ['divisions' => $divisions, 'users' => $users]);
        {
            $data = $request->all();
            $divisions = Division::all();
            $users = Division::all();

            if (isset($data["filter"])) {
                $users = DB::table('users')
                    ->join('divisions', 'users.id_division', '=', 'divisions.id')
                    ->select('users.*')->whereIn('divisions.id', $data["filter"])->get();

            }
            return new View('site.workers', ['divisions' => $divisions, 'users' => $users]);
        }
    }


//    public function filterWorkers(Request $request): string
//    {
//
//        $filter = $request->filter;
//        if (!$filter) {
//            app()->route->redirect('/workers');
//        } else {
//            $divisions = Division::all();
//            $users = DB::table('users')
//                ->join('divisions', 'users.id_division', '=', 'divisions.id')
//                ->select('users.*')->whereIn('divisions.id', $filter)->get();
//
//            return new View('site.workers', ['divisions' => $divisions, 'users' => $users]);
//        }
//    }
    public function filterWorkers(Request $request): string
    {
        $data = $request->all();
        $divisions = Division::all();
        $users = Division::all();

        if (isset($data["filter"])) {
            $users = DB::table('users')
                ->join('divisions', 'users.id_division', '=', 'divisions.id')
                ->select('users.*')->whereIn('divisions.id', $data["filter"])->get();

        }
        return new View('site.workers', ['divisions' => $divisions, 'users' => $users]);
    }

}
