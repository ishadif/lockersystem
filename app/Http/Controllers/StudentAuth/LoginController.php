<?php

namespace App\Http\Controllers\StudentAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	use AuthenticatesUsers;

	public function __construct()
	{
		$this->middleware('guest',['except' => 'logout']);
	}
	/**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/permohonan';

    public function username() 
    {
    	return 'id';
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('student.auth.login');
    }
    
    protected function validateLogin(Request $request)
    {
        $this->validate($request,[
            $this->username() => 'required|exists:students,id',
            'password' => 'required',
        ],[
            'id.exists' => 'NIM tidak ditemukan'
        ]);
    }
    
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('student');
    }
}