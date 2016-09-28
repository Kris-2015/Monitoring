<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Permission extends Model
{
	/**
 	 * Function to create the permission of the user
 	 * 
 	 * @param: resource
 	 * @return: integer
	 */
    public function createPermission($resource=NULL)
    {
    	$permission = Permission::create(['name' => 'edit profile']);
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
    	$user->revokePermissionTo('edit profile')
    }
}
