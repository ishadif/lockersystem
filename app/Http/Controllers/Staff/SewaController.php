<?php

namespace App\Http\Controllers\Staff;

use App\Filters\RentalFilters;
use App\Http\Controllers\Controller;
use App\Locker;
use App\RentalsSubmission;
use App\Sewa;
use App\Submission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class SewaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');    
    }

    public function index(RentalFilters $filter) {
        if (Gate::denies('show_sewa')) {
            return redirect()->back()
                    ->with(
                        'flash','Anda tidak dapat melihat halaman ini. hubungi admin untuk info lebih lanjut'
                    );
        }

        $rentals = Sewa::latest()->filter($filter)->get();

        return view('staff.sewa.index', compact('rentals'));
    }

    public function export(RentalFilters $filter) 
    {
        $rentals = Sewa::latest()->filter($filter)->get();

        return Excel::create("sewa-locker", function($excel) use ($rentals) {

            $excel->sheet('New sheet', function($sheet) use ($rentals) {

                $sheet->fromArray($rentals, null, 'A1', true);

            });

        })->export('xls');
    }
    

    public function create(RentalsSubmission $submission) {
        if (Gate::denies('create_sewa')) {
            return redirect()
                ->back()
                ->with('flash','Anda Tidak dapat mengakses halaman tersebut, hubungi admin untuk informasi lebih lanjut');
        }

        if ($submission->approved) {
            return redirect()->back();
        }

        $lockers = Locker::available()->get();

        return view('staff.sewa.create', compact('submission','lockers'));
    }
    
    
    public function store() {
    	$sewa = Sewa::create([
    		'student_id' => request('student_id'),
            'locker_id' => request('locker_id'),
    		'rental_submission_id' => request('rental_submission_id'),
    		'status' => 'pembayaran'
    	]);

    	$sewa->submission->approved();
        
        $sewa->locker->hasBeenRented();

    	return redirect('staff/sewa');
    }

    public function show(Sewa $rental) {
        if (Gate::denies('show_sewa')) {
            return redirect()->back()
                    ->with(
                        'flash','Anda tidak dapat melihat halaman ini. hubungi admin untuk info lebih lanjut'
                    );
        }

        return view('staff.sewa.show', compact('rental'));
    }
    
    
    public function activate(Sewa $sewa) {
        // if (Gate::denies('update_sewa')) {
        //     return redirect()->back()
        //             ->with(
        //                 'flash','Anda tidak dapat melihat halaman ini. hubungi admin untuk info lebih lanjut'
        //             );
        // }

        if ($sewa->status !== 'pengambilan kunci') {
            throw new \Exception('Permohonan sewa tidak dalam tahap pengambilan kunci');

            return redirect()->back();
        }

        $sewa->activate();

        return redirect("staff/sewa/{$sewa->id}");
    }

    public function finish(Sewa $sewa) 
    {
        // if (Gate::denies('update_sewa')) {
        //     return redirect()->back()
        //             ->with(
        //                 'flash','Anda tidak dapat melihat halaman ini. hubungi admin untuk info lebih lanjut'
        //             );
        // }

        if ($sewa->status != 'berjalan') {
            throw new \Exception('Permohonan sewa tidak dalam tahap berjalan');

            return redirect()->back();
        }

        $sewa->finish();

        return redirect("staff/sewa/{$sewa->id}");
    }
    
}
