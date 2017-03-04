<?php

use Illuminate\Support\Facades\Route;

Route::get('tasks/index', [
    'uses'  => 'TaskController@index',
    'as'    => 'tasks.index',
]);
Route::get('tasks/create', [
    'uses'  => 'TaskController@create',
    'as'    => 'tasks.create'
]);
Route::post('tasks/create', [
    'uses' => 'TaskController@store',
    'as' => 'tasks.store',
]);

//The tags controller
Route::get('tags/create', [
    'uses' => 'TagController@create',
    'as' => 'tags.create',
]);

Route::post('tags/create', [
    'uses' => 'TagController@store',
    'as' => 'tags.store',
]);

Route::get('tags/index', [
    'uses' => 'TagController@index',
    'as' => 'tags.index',
]);