<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class MaintenancePayment extends Model
{
    protected $fillable = ['maintenance_id','student_id','fee'];

    protected $with = ['maintenance'];

    public function maintenance() 
    {
    	return $this->belongsTo(Maintenance::class);
    }
    
    public function receivedFor($maintenance) 
    {
    	$maintenance->update([
    		'status' => 'berjalan',
    		'starts_date' => Carbon::now()
    	]);
    }
    
    public function scopeFilter($query, $filter) 
    {
        return $filter->apply($query);
    }
    
}
