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
    return view('auth/login');
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
Route::get('logout', [
    'as' => 'logout',
    'uses' => 'AuthController@logout'
]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'TemplateController@home');
    Route::get('profile', 'TemplateController@profile');
});

Route::get('page', 'TemplateController@index'); // Admin
Route::get('sample', 'TemplateController@sample'); // Super Admin 