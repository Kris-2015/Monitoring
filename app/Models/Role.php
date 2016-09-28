<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Role extends Model
{
	/** 
	 * Function to create role
	 *
	 * @param: role
	 * @return: integer
	 */
    public function createRole($role=NULL)
    {
    	// Create Roles
    	$role = Role::create(['name' => 'user']);
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
