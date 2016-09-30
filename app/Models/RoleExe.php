<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Exception;

class RoleExe extends Model
{
    // Specifying the table name to model
    protected $table = 'Roles';

    /** 
     * Function to create role
     *
     * @param: role
     * @return: integer
     */
    public static function createRole($data)
    {
        try
        {
            // Create Roles
            $role =  Role::create(['name' => $data]);

            // Check if the role value is not empty
            if ( ! empty($role) )
            {
                // Return true for successful adding role
                return 1;
            }            

            throw new \Exception('Database Error: Some problem occured while processing request');
        }
        catch ( \Exception $e)
        {
            // Log error
            errorReporting($e);

            // Return false for failed operation
            return 0;
        }
    }

    /**
     * Function to assign role to user
     *
     * @param: user id
     * @param: role
     * @return: integer
     */
    public function assignRole($user_id=null, $desired_role=null)
    {
        // assign the desired role to user
        $user->assignRole($user_id, 'admin');
    }

    /**
     * Function to remove the role of user
     *
     * @param: user id
     *
     * @return: integer
     */
    public function removeRole($user_id=null)
    {
        // Remove the role from user
        $user->removeRole($user_id);
    }
}
