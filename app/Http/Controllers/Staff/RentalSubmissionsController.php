<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\RentalsSubmission;
use Illuminate\Http\Request;

class RentalSubmissionsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');	
	}
	
    public function index() {
    	$submissions = RentalsSubmission::unprocessed()->latest()->get();

    	return view('staff.rental-submission.index', compact('submissions'));
    }
    
}
