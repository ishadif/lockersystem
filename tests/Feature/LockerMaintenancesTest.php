<?php

namespace Tests\Feature;

use App\Maintenance;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class LockerMaintenancesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function staff_process_maintenance_submissions_applied_by_student()
    {
    	$submission = create('App\MaintenancesSubmission');

    	$maintenance = make('App\Maintenance',[
    		'maintenances_submission_id' => $submission->id,
    		'student_id' => $submission->student_id,
    		'sewa_id' => $submission->sewa_id,
    		'locker_id' => $submission->locker_id,
            'maintenance_type' => $submission->maintenance_type
    	]);

    	$this->post("/staff/maintenance/{$submission->id}", $maintenance->toArray());

    	tap(Maintenance::latest()->first(), function($maintenance) use ($submission) {
    		$this->get('/staff/maintenance')
	    		->assertSee("$submission->id")
	    		->assertSee('pembayaran');

    		$this->assertEquals('pembayaran', $maintenance->status);
    		$this->assertEquals($submission->id, $maintenance->maintenances_submission_id);
    		$this->assertNull($maintenance->starts_date);
    	});
    }

    /** @test */
    function finishing_locker_maintenance()
    {
        $maintenance = create('App\Maintenance',[
            'status' => 'berjalan',
            'starts_date' => Carbon::yesterday()
        ]);

        $this->patch("/staff/maintenance/{$maintenance->id}");

        tap(Maintenance::latest()->first(), function($maintenance){
            $this->assertEquals($maintenance->ends_date, Carbon::now());
            $this->assertEquals($maintenance->status, 'selesai');
        });
    }

    /** @test */
    function search_maintenance_by_id()
    {
        $maintenanceOne = create('App\Maintenance');
        $maintenanceTwo = create('App\Maintenance');

        $this->get("/staff/maintenance?id={$maintenanceOne->id}")
            ->assertSee($maintenanceOne->locker_id)
            ->assertDontSee($maintenanceTwo->locker_id);
    }
}
