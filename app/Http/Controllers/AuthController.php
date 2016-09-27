<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use App\Http\Requests\RegistrationRequest;

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
        $insert = User::insertUser($request->all());

        if ( $insert)
        {
            return redirect('signUp')->with('message', ' Registration Successful');            
        }

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
    public function dologin(Request $request)
    {
       
        // Get email and password
        $email = $request->all()['email'];
        $password = $request->all()['password'];

        if ( Auth::attemp(['email' => $email, 'password' => $password]) )
        {
            return redirect('login')->with('message', 'Login Successful');
        }
    }
}
