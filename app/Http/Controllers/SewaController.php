<?php

namespace App\Http\Controllers;

use App\Sewa;
use Illuminate\Http\Request;

class SewaController extends Controller
{
	public function __construct()
	{
		$this->middleware('student');	
	}

    public function index() {
    	$student = auth()->guard('student')->user();
    	
    	$submission = $student->submissions()->latest()->unprocessed()->first();
    	$rentals = $student->rentals()
    		->latest()->get();

    	return view('student.sewa.index', compact('rentals','submission'));
    }
    
    public function show(Sewa $sewa) 
    {
        return view('student.sewa.show', compact('sewa'));
    }
    
}
