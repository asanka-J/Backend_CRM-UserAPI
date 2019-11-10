<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

Route::group([
    'middleware' => 'api',
    'prefix'     => 'auth',
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::patch('update', 'AuthController@update');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});



//User Api without auth
Route::group([
    'prefix'     => 'users',
], function ($router) {

    Route::get('/', 'UserController@index');
    Route::get('/{id}', 'UserController@show');
    Route::post('/create', 'UserController@create');
    Route::get('/name/{name}', 'UserController@showByName');
    Route::patch('/update/{id}/', 'UserController@update');
    Route::post('/delete/{id}', 'UserController@destroy');

});



