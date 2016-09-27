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
use App\Http\Requests;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;

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
            return redirect('login')->with('pass', 'Login Successful');
        }

        // Return user to login page on unsuccessful login with fail message
        return redirect('login')->with('fail', 'Invalid Login and Password');
    }
}
