<?php

namespace App;

use App\Permission;
use Illuminate\Support\Facades\Gate;

class RolePolicies {
	public static function define()
	{
		foreach(self::getPermissions() as $permission) {
            Gate::define($permission->name, function($user) use ($permission) {
                return $user->hasRole($permission->roles);
            });
        }
	}

	protected static function getPermissions()
	{
		try {
            return Permission::with('roles')->get();
        } catch (\Exception $e) {
            return [];
        }
	}
}