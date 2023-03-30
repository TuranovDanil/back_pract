<?php

namespace Controller;

use Model\Post;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Model\Discipline;
use Model\Division;
use Model\Position;
use Model\Sex;

class Site
{
    public function discipline(Request $request): string
    {
        $divisions = Division::all();
        $discipline = Discipline::all();
        return new View('site.discipline', ['discipline' => $discipline, 'divisions' => $divisions]);
    }

    public function workers(Request $request): string
    {
        $users = User::all();
        $divisions = Division::all();
        return new View('site.workers', ['divisions' => $divisions, 'users' => $users]);
    }

}
