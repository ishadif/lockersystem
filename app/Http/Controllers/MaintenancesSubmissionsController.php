<?php

namespace App\Http\Controllers;

use App\Sewa;
use App\Student;
use Illuminate\Http\Request;
use App\MaintenancesSubmission;
use App\Filters\MaintenanceSubmissionFilters;

class MaintenancesSubmissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

	public function index(MaintenanceSubmissionFilters $filter) 
	{
        $student = auth()->guard('student')->user();

        $submissions = $student->maintenanceSubmissions()
                            ->latest()
                            ->filter($filter)
                            ->get();

		return view('student.maintenance-submission.index', compact('submissions'));
	}

    public function create(Sewa $sewa) 
    {
        return view('student.maintenance-submission.create', compact('sewa'));
    }
	
    public function store(Sewa $sewa) 
    {
        if ($sewa->locker_id != request('locker_id')) {
            return redirect()->back();
        }
        
        MaintenancesSubmission::create([
            'sewa_id' => request('sewa_id'),
            'locker_id' => request('locker_id'),
            'student_id' => request('student_id'),
            'maintenance_type' => request('maintenance_type'),
            'description' => request('description')
        ]);
        
       return redirect('permohonan-maintenance');
    }
    
    public function show(MaintenancesSubmission $submission) 
    {
        return view('student.maintenance-submission.show', compact('submission'));    
    }
    
}
