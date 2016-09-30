<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Session;
use Auth;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Models\User;
use App\Models\RoleExe;
use App\Models\PermissionExe;
use App\Http\Requests;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;

/**
 * Manage registration and login requests
 * @access public
 * @package App\Http\Controllers
 * @subpackage void
 * @category void
 * @author mfsi-krishnadev
 * @link void
 */

class AuthController extends Controller
{
    /**
     * Function to show registration page
     *
     * @param: Request
     * @return: view 
     */
    public function registration(Request $request)
    {
        return view('auth/registration');
    }

    /**
     * Function to process the form data
     *
     * @param: Request
     * @return: view
     */
    public function doregister(RegistrationRequest $request)
    {
        // Create record for new user
        $insert = User::insertUser($request->all());

        // After successful insertion, redirect user with success message.
        if ( $insert)
        {
            return redirect('signUp')->with('message', ' Registration Successful');            
        }

        // On unsuccessful insertion, give message to user.
        return redirect('signUp')->with('warning', ' Registration Not Successful');
    }

    /**
     * Function to show login page
     *
     * @param: Request
     * @return: view
     */
    public function login(Request $request)
    {
        return view('auth/login');
    }

    /**
     * Function to process the login information
     * 
     * @param: Request
     * @return: view
     */
    public function dologin(LoginRequest $request)
    {
        // Get email and password
        $email = $request->all()['email'];
        $password = $request->all()['password'];

        // Authenticate the user 
        if ( Auth::attempt(['email' => $email, 'password' => $password]) )
        {
            return redirect('home');
        }

        // Return user to login page on unsuccessful login with fail message
        return redirect('login')->with('fail', 'Invalid Login and Password');
    }

    /**
     * Function to logout user
     *
     * @param: Request
     * @return: view
     */ 
    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();

        // After successful logout, redirect user to login page
        return redirect('login');
    }

    /**
     * Function to create roles for user
     *
     * @param: Request
     * @return: view
    */
    public function createRolesDashboard(Request $request)
    {
        return view('auth/role-dashboard');
    }

    /**
     * Function to handle the post request to create role
     *
     * @param: Request
     * @return: redirect
     */
    public function makeRole(Request $request)
    {
        $role = $request->all()['role'];
        
        // Creating new role
        $create_role = RoleExe::createRole($role);

        if ( $create_role )
        {
            return redirect('roles')->with('message', 'Role created successfully.');
        }

        return redirect('roles')->with('fail', ' Error occured while creating role.');
    }

    /**
     * Function to create roles for user
     *
     * @param: Request
     * @return: view
     */
    public function createPermissionsDashboard(Request $request)
    {
        return view('auth/permission');
    }

    /**
     * Function to handle the post request to create permissions
     *
     * @param: Request
     * @return: redirect
     */
    public function makePermission(Request $request)
    {
        $permission = $request->all()['permission'];
        
        // Creating new role
        $create_permission = PermissionExe::createPermission($permission);

        if ( $create_permission )
        {
            return redirect('permissions')->with('message', 'Permission created successfully.');
        }

        return redirect('permissions')->with('fail', ' Error occured while creating permission.');
    }
}