<?php

use Src\Route;


Route::add(['GET', 'POST'], '/signup', [Controller\Admin::class, 'signup'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/login', [Controller\Authentication::class, 'login']);
Route::add('GET', '/logout', [Controller\Authentication::class, 'logout']);

Route::add(['GET', 'POST'], '/discipline', [Controller\Disciplines::class, 'discipline'])->middleware('auth');
Route::group('/dis', function (){
    Route::add(['GET', 'POST'], '/dis/{id}', [Controller\Disciplines::class, 'dis'])->middleware('auth', 'moder');
    Route::add(['GET', 'POST'], '/dis/{id}/delete', [Controller\Disciplines::class, 'disDelete'])->middleware('auth', 'moder');
});

Route::group('/workers', function (){
    Route::add(['GET', 'POST'], '/workers', [Controller\Workers::class, 'workers'])->middleware('auth');
});
Route::group('/worker', function (){
    Route::add(['GET', 'POST'], '/worker/{id}', [Controller\Workers::class, 'worker'])->middleware('auth', 'moder');
    Route::add(['GET', 'POST'], '/worker/{id}/delete', [Controller\Workers::class, 'workerDelete'])->middleware('auth', 'moder');
});



Route::group('/moder', function (){
    Route::add(['GET', 'POST'], '/moder', [Controller\Moder::class, 'moder'])->middleware('auth','moder');
    Route::add(['GET', 'POST'], '/add-discipline', [Controller\Moder::class, 'addDiscipline'])->middleware('auth','moder');
    Route::add(['GET', 'POST'], '/add-division', [Controller\Moder::class, 'addDivision'])->middleware('auth','moder');
    Route::add(['GET', 'POST'], '/add-type', [Controller\Moder::class, 'addType'])->middleware('auth','moder');
    Route::add(['GET', 'POST'], '/add-position', [Controller\Moder::class, 'addPosition'])->middleware('auth','moder');
});