<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('adminlte/admin-template');
});

Route::get('signUp', 'AuthController@registration');
Route::get('login', 'AuthController@login');
Route::post('doregister', [
    'as' => 'doregister', 
    'uses' => 'AuthController@doRegister'
]);

Route::post('dologin', [
    'as' => 'dologin', 
    'uses' => 'AuthController@dologin'
]);

Route::get('page', 'TemplateController@index');
Route::get('sample', 'TemplateController@sample');