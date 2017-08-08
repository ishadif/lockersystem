<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LockerMaintenanceSubmissionsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function student_submit_locker_maintenance_submission()
    {
        $student = create('App\Student');

    	$sewa = create('App\Sewa',['student_id' => $student->id]);


        $submission = make('App\MaintenancesSubmission',[
            'sewa_id' => $sewa->id,
            'locker_id' => $sewa->locker_id,
            'student_id' => $sewa->student_id,
            'maintenance_type' => 'ganti kunci'
        ]);

        $this->signIn($student,'student')
            ->post("/permohonan-maintenance/{$sewa->id}", $submission->toArray());


    	$this->get('/permohonan-maintenance')
			->assertSee("$submission->sewa_id");

    	$this->assertEquals($submission->approved, false);
    }
}
