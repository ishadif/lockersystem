<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\StudentAuth\StudentCanResetPassword;

class ProfilesController extends Controller
{
	use StudentCanResetPassword;

	/**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/permohonan';

	public function __construct()
	{
		$this->middleware('student');	
	}

    public function index() 
    {
    	return view('student.profile.index');
    }

    
}
