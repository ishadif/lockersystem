<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Locker;
use Illuminate\Http\Request;

class LockersController extends Controller
{
	public function index() 
	{
		$lockers = Locker::orderBy('id')->get();
		$total = Locker::available()->count();
		return view('staff.lockers.index', compact('lockers','total'));
	}
	
    public function store() 
    {
    	Locker::create([
    		'id' => request('id')
    	]);	
    }

    public function show(Locker $locker) 
    {
    	return view('staff.lockers.show', compact('locker'));
    }
    
    
}
