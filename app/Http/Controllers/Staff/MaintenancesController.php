<?php

namespace App\Http\Controllers\Staff;

use App\Filters\MaintenanceFilters;
use App\Http\Controllers\Controller;
use App\Maintenance;
use App\MaintenancesSubmission;
use Illuminate\Http\Request;

class MaintenancesController extends Controller
{
	public function index(MaintenanceFilters $filter) 
	{
		$maintenances = Maintenance::latest()->filter($filter)->get();
        
		return view('staff.maintenance.index', compact('maintenances'));
	}

    public function create(MaintenancesSubmission $submission) 
    {
        return view('staff.maintenance.create', compact('submission'));
    }
    
	
    public function store(MaintenancesSubmission $submission) 
    {
    	$submission->maintenance()->create([
            'student_id' => request('student_id'),
    		'maintenance_type' => request('maintenance_type'),
    		'locker_id' => request('locker_id'),
    		'sewa_id' => request('sewa_id'),
    		'status' => 'pembayaran',
    	]);

    	$submission->approve();

    	return redirect('staff/maintenance');
    }
    
    public function show(Maintenance $maintenance) 
    {
        return view('staff.maintenance.show', compact('maintenance'));
    }

    public function update(Maintenance $maintenance) 
    {
        if (! $maintenance->status == 'berjalan') {
            return redirect()->back();
        }

        $maintenance->finished();

        return redirect()->back();
    }
    
    
}
