<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\StaffResetPassword;

class ProfilesController extends Controller
{
	use StaffResetPassword;
	
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index() 
    {
    	$staff = auth()->user();

    	return view('staff.profile.index', compact('staff'));
    }
    
    public function update(Request $request) 
    {
    	$this->validate($request,[
    		'email' => 'required|email'
    	]);

    	auth()->user()->update(['email' => $request->email]);

    	return redirect()->back()->with('flash','profil anda telah diperbarui');
    }
    
}
