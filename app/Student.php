<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
	/**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * define attributes that can be mass assigned
     * 
     * @var array
     */
    protected $fillable = [
        'id','email','address','password',
        'telephone','name','study_program_id'
    ];

    /**
     * hidden visibility of some attributes
     * 
     * @var array
     */
    protected $hidden = ['password','remember_token'];

    public static function boot() 
    {
        parent::boot();

        static::creating(function($student){
            $student->password = bcrypt("{$student->id}@password");
        });
    }
    
    public function program() 
    {
        return $this->belongsTo(StudyProgram::class,'study_program_id');    
    }
    

	public function submissions() {
		return $this->hasMany(RentalsSubmission::class);
	}

    public function maintenanceSubmissions() 
    {
        return $this->hasMany(MaintenancesSubmission::class);
    }
    
	
    public function applySubmission($submission) {
    	$this->submissions()->create($submission);
    }
    
    public function rentals() 
    {
        return $this->hasMany(Sewa::class);
    }
    
}
