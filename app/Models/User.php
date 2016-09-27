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
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    use SoftDeletes;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
        'password', 'remember_token',
    ];*/

    public static function insertUser($data)
    {   
        try
        {
            $user = new User();

            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $success = $user->save();

            if ( $success != 0)
            {
                return 1;
            }

            throw new \Exception("Database Error: Error occured while processing request");
        }
        catch ( \Exception $e)
        {
            Log::error($e);
            return 0;
        }
    }
}