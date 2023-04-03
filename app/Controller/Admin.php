<?php

namespace Controller;


use Src\Validator\Validator;
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
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required'],
                'surname' => ['required'],
                'patronymic' => ['required'],
                'id_sex' => ['required'],
                'birth' => ['required'],
                'address' => ['required'],
                'id_position' => ['required'],
                'id_division' => ['required'],
                'role' => ['required'],
                'avatar' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if ($validator->fails()) {
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'positions' => $positions, 'divisions' => $divisions, 'sexes' => $sexes]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/workers');
            }

            $request = app('request');
            if ($request->hasfile('avatar')) {
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();

                //Implement check here to create directory if not exist already
                //Сделал тест ресайза и папки

                Image::make($avatar)->resize(300, 300)->save(public_path('public/uploads/' . $filename));
            }

            return User::create([
                'avatar' => !empty($filename) ? $filename : 'default_avatar.png',
            ]);
        }
        return new View('site.signup', ['positions' => $positions, 'divisions' => $divisions, 'sexes' => $sexes]);
    }

}
