<?php

namespace App\Http\Controllers\Staff;

use App\Filters\RentalFilters;
use App\Filters\RentalPaymentFilters;
use App\Http\Controllers\Controller;
use App\RentalPayment;
use App\Sewa;
use Illuminate\Http\Request;

class RentalPaymentsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index(RentalPaymentFilters $filter) {
		$payments = RentalPayment::latest()->filter($filter)->get();

		return view('staff.rental-payment.index', [
			'payments' => $payments
		]);
	}

	public function create(Sewa $rental) {
		return view('staff.rental-payment.create', compact('rental'));
	}
	
	
    public function store(Sewa $sewa) {
    	$payment = RentalPayment::payFor(request('sewa_id'), request('fee'));

    	$sewa->hasBeenPaid();

    	return redirect('staff/payment');
    }

    public function show(RentalPayment $payment) 
    {
    	return view('staff.rental-payment.show', compact('payment'));
    }
    
    
    public function submission(RentalFilters $filter) 
    {
		$rentals = Sewa::latest()->whereStatus('pembayaran')->filter($filter)->get();

    	return view('staff.rental-payment.submission', compact('rentals'));	
    }
    
}
