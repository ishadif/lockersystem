<?php

namespace App\Http\Controllers\Staff;

use App\Filters\StaffFilters;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');	
	}

    public function index(StaffFilters $filter) 
    {
    	$users = User::latest()->filter($filter)->get();

    	$roles = Role::all();

    	return view('staff.users.index', compact('users','roles'));
    }
    
}
