<?php

use Src\Route;

Route::add(['GET', 'POST'], '/discipline', [Controller\Site::class, 'discipline'])->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);