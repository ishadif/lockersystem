<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    protected $fillable = [
        'student_id','locker_id','status',
        'starts_date','ends_date','rental_submission_id'
    ];

    protected $table = 'sewa';

    public function locker() 
    {
        return $this->belongsTo(Locker::class);
    }
    
    public function submission() {
    	return $this->belongsTo(RentalsSubmission::class,'rental_submission_id');
    }

    public function hasBeenPaid() {
    	$this->update(['status' => 'pengambilan kunci']);
    }
    
    public function activate() {
    	$this->update([
    		'status' => 'berjalan',
    		'starts_date' => Carbon::now(),
    		'ends_date' => Carbon::now()->addYear()
    	]);
    }
    
    public function finish() 
    {
        $this->update([
            'status' => 'selesai',
            'ends_date' => Carbon::now()
        ]);
    }
    
    public function scopeFilter($query, $filter) 
    {
        return $filter->apply($query);
    }
    
}
