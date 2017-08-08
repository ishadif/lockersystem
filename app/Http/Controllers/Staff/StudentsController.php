<?php

namespace App\Http\Controllers\Staff;

use App\Student;
use App\StudyProgram;
use Illuminate\Http\Request;
use App\Mail\StudentCreatedMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class StudentsController extends Controller
{
	public function __construct()
	{
		// $this->middleware('auth');
	}

	public function index() 
	{
		$students = Student::all();

		return view('staff.students.index', compact('students'));
	}

    public function create() 
    {
        $programs = StudyProgram::all();

        return view('staff.students.create', compact('programs'));
    }
    
	
    public function store(Request $request) 
    {
    	$this->validate($request, [
            'id' => 'required|unique:students,id',
    		'study_program_id' => 'required | exists:study_programs,id',
    		'name' => 'required',
    		'email' => 'required|unique:students,email',
    		'address' => 'required',
    		'telephone' => 'required',
    	]);

    	$student = Student::create([
            'id' => request('id'),
            'name' => request('name'),
            'email' => request('email'),
            'address' => request('address'),
            'telephone' => request('telephone'),
    		'study_program_id' => request('study_program_id'),
    	]);

        Mail::to(request('email'))->send(new StudentCreatedMail($student));

    	return redirect('staff/students');
    }
    
}
