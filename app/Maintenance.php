<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
    	'student_id','locker_id','sewa_id','status',
    	'starts_date','ends_date','maintenance_type'
    ];

    public function finished() 
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
