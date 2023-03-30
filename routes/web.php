<?php

use Src\Route;

Route::add(['GET', 'POST'], '/discipline', [Controller\Site::class, 'discipline'])->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Admin::class, 'signup'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/login', [Controller\Authentication::class, 'login']);
Route::add('GET', '/logout', [Controller\Authentication::class, 'logout']);
Route::add(['GET', 'POST'], '/moder', [Controller\Moder::class, 'moder'])->middleware('auth','moder');
Route::add(['GET', 'POST'], '/workers', [Controller\Site::class, 'workers'])->middleware('auth');;