<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class MaintenancesSubmission extends Model
{
    protected $fillable = [
    	'sewa_id','locker_id','student_id',
    	'approved','description','maintenance_type',
    	'processed_at'
    ];

    public function maintenance() 
    {
    	return $this->hasOne(Maintenance::class,'maintenances_submission_id');
    }

    public function scopeUnprocessed($query) 
    {
        return $query->where('processed_at', null)
            ->get();
    }
    
    
    public function approve() 
    {
    	$this->update([
    		'approved' => true,
    		'processed_at' => Carbon::now()
    	]);
    }
    
    public function scopeFilter($query, $filter) 
    {
        return $filter->apply($query);
    }
    
}
