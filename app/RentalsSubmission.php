<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class RentalsSubmission extends Model
{
    protected $fillable = ['student_id','approved','processed_at'];

    public function path() {
    	return '/permohonan/' . $this->id;
    }

    public function student() {
    	return $this->belongsTo(Student::class);
    }

    public function rental() {
        return $this->hasOne(Sewa::class, 'rental_submission_id');
    }
    
    
    public function updateStudent($data = []) {
    	$this->student->update([
    		'email' => $data['email'],
    		'address' => $data['address'],
    		'telephone' => $data['telephone']
    	]);
    }
    
    public function approved() {
        $this->update([
            'approved' => true,
            'processed_at' => Carbon::now()
        ]);
    }

    public function scopeUnprocessed($query) {
        return $query->where('processed_at', null);
    }
    
    public static function submitFor($data) 
    {
        self::create([
            'student_id' => $data['student_id']
        ])->updateStudent($data);
    }
    
}
