<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [
    'uses' => 'TaskController@index',
    'as' => 'tasks.index'
]);

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('tasks/{task}-{slug}', [
    'uses' => 'TaskController@show',
    'as' => 'tasks.show'
])->where('task', '\d+');

