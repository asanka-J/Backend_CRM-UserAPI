<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



////
//Route::get('/users', 'UserController@index');
//Route::get('/users/create', 'UserController@create');
//Route::get('/users/{id}', 'UserController@show');
//Route::get('/users/name/{name}', 'UserController@showByName');
//Route::get('/users/update/{id}/', 'UserController@update');
//Route::get('/users/delete/{id}', 'UserController@destroy');

