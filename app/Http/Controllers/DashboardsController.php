<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardsController extends Controller
{
    public function __construct()
    {
    	$this->middleware('student');	
    }

    public function index() 
    {
    	return view('student.dashboard.index');
    }
    
}
