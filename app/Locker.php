<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    public $incrementing = false;

    protected $fillable = ['id','available'];

    public function maintenances() 
    {
        return $this->hasMany(Maintenance::class);    
    }
    

    public function scopeAvailable($query) 
    {
    	return $query->where('available', true);
    }
    
    public function hasBeenRented() 
    {
    	$this->update(['available' => false]);
    }
    
}
