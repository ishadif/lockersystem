<?php

namespace App\Http\Controllers\Staff;

use App\Filters\MaintenanceFilters;
use App\Filters\MaintenancePaymentFilters;
use App\Http\Controllers\Controller;
use App\Maintenance;
use App\MaintenancePayment;
use Illuminate\Http\Request;

class MaintenancePaymentsController extends Controller
{
    public function index(MaintenancePaymentFilters $filter) 
    {
        $payments = MaintenancePayment::latest()
                                ->filter($filter)
                                ->get();

        return view('staff.maintenance-payment.index', compact('payments'));
    }
    
    public function create(Maintenance $maintenance) 
    {
        return view('staff.maintenance-payment.create', compact('maintenance'));
    }
    
    public function store(Maintenance $maintenance) 
    {
    	$payment = MaintenancePayment::create([
    		'maintenance_id' => request('maintenance_id'),
    		'student_id' => request('student_id'),
    		'fee' => request('fee'),
    	]);

    	$payment->receivedFor($maintenance);

    	return redirect('/staff/maintenance-payments');
    }
    
    public function submission(MaintenanceFilters $filter) 
    {
        $maintenances = Maintenance::latest()->whereStatus('pembayaran')->filter($filter)->get();

        return view('staff.maintenance-payment.submission', compact('maintenances'));    
    }
    
    public function show(MaintenancePayment $payment) 
    {
        return view('staff.maintenance-payment.show', compact('payment'));
    }
    
}
