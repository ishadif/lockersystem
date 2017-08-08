<?php

namespace Tests\Unit;

use App\RentalsSubmission;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RentalSubmissionTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function submissions_has_creator()
	{
	   $submission = factory('App\RentalsSubmission')->create();

	   $this->assertInstanceOf('App\Student', $submission->student);
	}

    /** @test */
    function it_submit_locker_rental_request_and_update_student_profile()
    {
        $student =  create('App\Student',['email' => 'john@example.com']);

        $request = collect([
            'student_id' => $student->id,
            'email' => 'anotherJohn@example.com',
            'address' => $student->address,
            'telephone' => $student->telephone,
        ]);

        $submission = RentalsSubmission::submitFor($request);

        $this->assertEquals($student->fresh()->email, 'anotherJohn@example.com');
    }

    /** @test */
    public function a_submission_has_one_rental_only()
    {
        $submission = create('App\RentalsSubmission');
        create('App\Sewa',[
            'rental_submission_id' => $submission->id,
            'student_id' => $submission->student_id
        ]);
        
        $this->assertInstanceOf('App\Sewa', $submission->rental);
    }

    /** @test */
    public function it_updates_student_information_once_submission_is_created()
    {
    	$student = factory('App\Student')->create(['email' => 'ishadi@example.com']);

    	$request = [
    		'email' => 'another@example.com',
    		'address' => $student->address,
    		'telephone' => $student->address
    	];

    	$submission = new RentalsSubmission(['student_id' => $student->id]);

    	$submission->updateStudent([
    		'email' => $request['email'],
    		'address' => $request['address'],
    		'telephone' => $request['email'],
    	]);

    	$this->assertEquals($submission->student->email,'another@example.com');
    }

    /** @test */
    public function show_unprocessed_submissions()
    {
        $processed = create('App\RentalsSubmission',['processed_at' => Carbon::now()]);
        $unprocessed = create('App\RentalsSubmission');

        $submissions = RentalsSubmission::unprocessed()->get();

        $this->assertCount(1, $submissions);

        $this->assertEquals($submissions->first()->id, $unprocessed->id);
    }

    /** @test */
    public function approving_rental_submission()
    {
        $submission = create('App\RentalsSubmission');

        $submission->approved();

        $this->assertEquals($submission->fresh()->approved, true);
        
        $this->assertEquals($submission->fresh()->processed_at, Carbon::now());
    }
}
