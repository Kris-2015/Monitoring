<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasRoles extends Model
{
    public function userHasRole()
    {
    	// Get the permission of the user
    	$permission = $user->permission;

    	// Get the role of the user
    	$roles = $user->roles()->pluck('name'); // 
    }
}
