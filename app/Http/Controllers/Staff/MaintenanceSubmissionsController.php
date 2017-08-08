<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\MaintenancesSubmission;
use Illuminate\Http\Request;

class MaintenanceSubmissionsController extends Controller
{
    public function index() 
    {
        $submissions = MaintenancesSubmission::latest()->get();
    	
    	return view('staff.maintenance-submission.index', compact('submissions'));
    }
    
}
