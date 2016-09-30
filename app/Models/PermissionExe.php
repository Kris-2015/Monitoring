<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PermissionExe  extends Model
{
	/**
 	 * Function to create the permission of the user
 	 * 
 	 * @param: resource
 	 * @return: integer
	 */
    public static function createPermission($permission)
    {
        try
        {
            // Creating Permissions
            $permission = Permission::create(['name' => $permission]);

            // Check if permission has some value
            if ( ! empty($permission) )
            {
                // Return true on succesfull operation
                return 1;
            }

            throw new \Exception('Database Error: Error occured while updating permission table');
        }
    	catch( \Exception $e )
        {
            // Report error
            errorReporting($e);

            // Return false if the operation is unsuccessful
            return 0;
        }
    }

    /**
	 * Function to check the permission of user
	 * 
	 * @param: user_id
	 * @return: integer
     */
    public function checkPermission()
    {
    	$user->hasPermissionTo('edit profile');
    }

    /**
	 * Function to give permission to user
	 *
	 * @param: role
	 * @param: resource
	 * 
	 * @return: integer
     */
    public function givePermission($role=null, $resource=null)
    {
    	$user->givePermissionTo('edit profile');


    }

    /**
	 * Function to revoke permission of user
	 * 
	 * @param: user id
	 * @param: resource
	 * @return: integer
     */
    public function revokePermission($user=null)
    {
    	$user->revokePermissionTo('edit profile');
    }
}
