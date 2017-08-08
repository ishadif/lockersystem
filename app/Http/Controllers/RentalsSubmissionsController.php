<?php

namespace App\Http\Controllers;

use App\User;
use App\Student;
use App\RentalsSubmission;
use Illuminate\Http\Request;
use App\Mail\LockerRentalSubmitted;
use Illuminate\Support\Facades\Mail;
use App\Mail\Rentals\LockerRentalReceived;

class RentalsSubmissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }
    
	public function index(Request $request) {
		$submissions = auth()->guard('student')->user()->submissions()->latest();

        if ($request->has('id')) {
            $submissions->where('id', request('id')); 
        }

        if ($request->has('approved')) {
            $submissions->where('approved', (int) $request->approved);
        }

        $submissions = $submissions->get();

		return view('student.rental-submission.index', compact('submissions'));
	}
	
    public function create() {
        $student = auth()->guard('student')->user();

        return view('student.rental-submission.create', compact('student'));
    }
    
    public function store(Request $request) {
        $staff = User::first(); //this will be changed after role authorization has been setup 

        $this->validate($request,[
            'student_id' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'telephone' => 'required'
        ]);

        $submission = RentalsSubmission::submitFor($request->all());
        
        $rentalSubmission = RentalsSubmission::latest()->first();

        Mail::to($request->email)->send(new LockerRentalSubmitted($rentalSubmission));

        Mail::to($staff->email)->send(new LockerRentalReceived($rentalSubmission));

    	return redirect($rentalSubmission->path());
    }
    
    public function show(RentalsSubmission $submission) {
    	return view('student.rental-submission.show', [
            'submission' => $submission,
            'rental' => $submission->rental
        ]);
    }
    
}
