<?php

namespace Tests\Feature;

use App\Mail\LockerRentalSubmitted;
use App\Mail\Rentals\LockerRentalReceived;
use App\RentalsSubmission;
use App\Student;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class LockersRentalSubmissionsTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    function unauthenticated_student_must_login_to_apply_submissions()
    {
      $this->withExceptionHandling();
      
      $this->get('/permohonan')
          ->assertRedirect('login');
    }

    /** @test */
    function staff_cannot_access_student_rental_submission_page()
    {
      $staff = create('App\User');

      $this->signIn($staff);

      $this->get('/staff/permohonan');

      $this->get('/permohonan')
          ->assertRedirect('/staff/permohonan');
    }

    /** @test */
    function student_can_apply_locker_rental_then_get_notification_email()
    {
      Mail::fake();

      $student = create('App\Student');

      $this->signIn($student,'student');
      
      $submission = $this->applySubmission([
        'student_id' => $student->id,
        'email' => $student->email,
        'address' => $student->address,
        'telephone' => $student->telephone,
      ]);

      tap(RentalsSubmission::latest()->first(), function($submission) use ($student){

        $this->get("/permohonan/{$submission->id}")
          ->assertSee("$submission->id");
          
       $this->assertEquals($submission->processed_at, null);

        Mail::assertSent(LockerRentalSubmitted::class, function($mail) use ($submission, $student){
          return $mail->submission->id == $submission->id &&
                 $mail->hasTo($student->email);
        });
        
      });

    }

    /** @test */
    function staff_receive_notification_email_once_locker_rental_has_been_submitted()
    {
      Mail::fake();

      $student = create('App\Student');
      $staff = create('App\User');

      $this->signIn($student,'student');

      $submission = $this->applySubmission([
        'student_id' => $student->id,
        'email' => $student->email,
        'address' => $student->address,
        'telephone' => $student->telephone,
      ]);

      Mail::assertSent(LockerRentalReceived::class, function($mail) use ($staff) {
        return $mail->hasTo($staff->email);
      });
    }

    /** @test */
    public function a_submission_require_student_id()
    {
      $student = create('App\Student');

      $this->signIn($student, 'student');

      $this->applySubmission(['student_id' => null])
          ->assertSessionHasErrors('student_id');
    }

    /** @test */
    public function a_submission_require_student_email()
    {
      $student = create('App\Student');

      $this->signIn($student, 'student');

      $this->applySubmission([
          'email' => null,
      ])->assertSessionHasErrors('email');
    }

    /** @test */
    public function a_submission_require_student_valid_email()
    {
      $student = create('App\Student');

      $this->signIn($student, 'student');

      $this->applySubmission([
          'email' => 'notvalidemail',
      ])->assertSessionHasErrors('email');
    }

    /** @test */
    public function a_submission_require_student_address()
    {
      $student = create('App\Student');

      $this->signIn($student, 'student');

      $this->applySubmission([
          'address' => null,
      ])->assertSessionHasErrors('address');
    }

    /** @test */
    public function a_submission_require_student_telephone()
    {
      $student = create('App\Student');

      $this->signIn($student, 'student');

      $this->applySubmission([
          'telephone' => null,
      ])->assertSessionHasErrors('telephone');
    }

    /** @test */
    function filter_rental_submissions_by_id()
    {
      $student = create('App\Student');

      $this->signIn($student, 'student');

      $submissionOne = create('App\RentalsSubmission');
      $submissionTwo = create('App\RentalsSubmission',[
        'approved' => true,
        'processed_at' => Carbon::now()->subWeek()
      ]);

      $this->get("/permohonan?id={$submissionOne->id}")
          ->assertSee("$submissionOne->id")
          ->assertDontSee("$submissionTwo->processed_at");
    }

    /** @test */
    function filter_rental_submissions_by_status()
    {
      $student = create('App\Student');

      $this->signIn($student, 'student');

      $submissionOne = create('App\RentalsSubmission',['student_id' => $student->id]);
      $submissionTwo = create('App\RentalsSubmission',[
        'approved' => true,
        'processed_at' => Carbon::now()->subWeek(),
        'student_id' => $student->id
      ]);

      $this->get("/permohonan?id=&approved=1")
          ->assertSee("$submissionTwo->processed_at")
          ->assertDontSee("belum terinput");
    }

    protected function applySubmission($overrides = [])
    {
      $this->withExceptionHandling();

      $submission = make('App\RentalsSubmission', $overrides);

      return $this->post('/permohonan', $submission->toArray());
    }
}
