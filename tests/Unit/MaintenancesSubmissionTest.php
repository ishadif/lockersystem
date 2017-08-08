<?php

namespace Tests\Unit;

use App\MaintenancesSubmission;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class MaintenancesSubmissionTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function approving_maintenance_submission_once_staff_has_been_processed_it()
    {
    	$submission = create('App\MaintenancesSubmission');

    	$submission->approve();

    	$this->assertEquals($submission->fresh()->approved, true);
    	$this->assertEquals($submission->fresh()->processed_at, Carbon::now());
    }

    /** @test */
    public function it_fetches_all_unprocessed_maintenance_submissions()
    {
    	$processed = create('App\MaintenancesSubmission',[
    		'approved' => true,
    		'processed_at' => Carbon::now()
    	]);
    	$unprocessedSubmission = create('App\MaintenancesSubmission');

    	$submissions = MaintenancesSubmission::unprocessed();
    	
    	$this->assertTrue($submissions->contains('id', $unprocessedSubmission->id));
    }
}
