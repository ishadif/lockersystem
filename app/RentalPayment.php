<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalPayment extends Model
{
	protected $fillable = ['sewa_id','fee'];

    protected $with = ['rental'];

	public function rental() {
		return $this->belongsTo(Sewa::class,'sewa_id');
	}

    public function scopePayFor($query, $sewaId, $fee) {
    	return $query->create([
    		'sewa_id' => $sewaId,
    		'fee' => $fee
    	]);
    }

    public function scopeFilter($query, $filter) 
    {
        return $filter->apply($query);
    }
    
    
}
