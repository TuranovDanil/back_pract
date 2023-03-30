<?php

namespace Controller;


use Src\View;
use Src\Request;
use Model\User;
use Model\Division;
use Model\Position;
use Model\Sex;

class Admin
{

    public function signup(Request $request): string
    {
        $divisions = Division::all();
        $positions = Position::all();
        $sexes = Sex::all();
        if ($request->method==='POST' && User::create($request->all())){
            app()->route->redirect('/discipline');
        }
        return new View('site.signup', ['positions' => $positions, 'divisions' => $divisions, 'sexes' => $sexes]);
    }

}
