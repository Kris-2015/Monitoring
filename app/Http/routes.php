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

// Default view of application
Route::get('/', function () {
    
    // Return view to the logged in user
    if ( Auth::check() )
    {
        return redirect('home');
    }

    // Show login screen to new user
    return view('auth/login');
});

// Registration page 
Route::get('signUp', 'AuthController@registration');

// Login Page
Route::get('login', 'AuthController@login');

// Post Request action after register button is clicked
Route::post('doregister', [
    'as' => 'doregister', 
    'uses' => 'AuthController@doRegister'
]);

// Post Request action after login button is clicked
Route::post('dologin', [
    'as' => 'dologin', 
    'uses' => 'AuthController@dologin'
]);

// Logging out the user
Route::get('logout', [
    'as' => 'logout',
    'uses' => 'AuthController@logout'
]);

// Post request action to create role
Route::post('make_role', [
    'as' => 'make_role',
    'uses' => 'AuthController@makeRole'
]);

// Post request action to create role
Route::post('make_permission', [
    'as' => 'make_permission',
    'uses' => 'AuthController@makePermission'
]);

// Groupping the routes for restricted resources
Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'TemplateController@home');  // Home page after login
    Route::get('profile', 'TemplateController@profile'); // Profile of user
    Route::get('roles', 'AuthController@createRolesDashboard'); // Create Roles for User
    Route::get('permissions', 'AuthController@createPermissionsDashboard'); // Create Permission for particular roles
});

Route::get('page', 'TemplateController@index'); // Admin
Route::get('sample', 'TemplateController@sample'); // Super Admin 

Route::get('oauth', 'JiraController@configureClient');

Route::get('authorize', 'JiraController@authorizeData');