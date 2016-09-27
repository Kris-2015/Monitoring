<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;
use Log;
use Illuminate\Http\Request;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    protected $table = 'users';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * Function for inserting user data
     * 
     * @param: users data
     * @return: integer
     */
    public static function insertUser($data)
    {   
        try
        {   
            // Instantiate the User class
            $user = new User();

            // Insertion of data in users table
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $success = $user->save();

            // On success, return true
            if ( $success != 0)
            {
                return 1;
            }

            throw new \Exception("Database Error: Error occured while processing request");
        }
        catch ( \Exception $e)
        {
            // Log error for failed transaction
            Log::error($e);

            // Return false for failed operation
            return 0;
        }
    }
}