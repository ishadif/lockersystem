<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Carbon\Carbon;

class LockerRentalsTest extends TestCase
{
	 use DatabaseMigrations;

   /** @test */
   function staff_must_be_login_to_access_rental_page()
   {
      $this->withExceptionHandling();
    
      $this->get('/staff/sewa')
          ->assertRedirect('/staff/login');
   }

   // /** @test */
   // function student_cannot_access_rental_page_for_staff_and_will_be_redirected_back()
   // {
   //    $this->withExceptionHandling();

   //    $student = create('App\Student');

   //    $this->signIn($student,'student')
   //        ->get('/permohonan');

   //    $this->get('/staff/sewa')
   //        ->assertRedirect('/staff/login');
   // }

    /** @test */
    public function staff_process_rental_permission_once_it_has_been_created()
    {
      $submission = factory('App\RentalsSubmission')->create();
      $locker = factory('App\Locker')->create();
      $sewa = factory('App\Sewa')->make([
        'locker_id' => $locker->id,
        'student_id' => $submission->student_id,
        'rental_submission_id' => $submission->id
      ]);

      $staff = create('App\User');

      $this->signIn($staff);

      $this->post("/staff/permohonan/{$submission->id}", $sewa->toArray());

      $this->get('/staff/sewa')
          ->assertSee("$sewa->student_id");
          
      $this->assertEquals('pembayaran', $sewa->status);
      $this->assertEquals(false, $locker->available);
    }

    /** @test */
    public function staff_can_activate_rental_once_student_has_paid_rental_fee()
    {
      $role = create('App\Role',['name' => 'kemahasiswaan']);
      $sewa = factory('App\Sewa')->create(['status' => 'pengambilan kunci']);
      $staff = create('App\User');

      $staff->assignRole($role);

      $this->signIn($staff);

      $this->patch("/staff/sewa/{$sewa->id}/activate", $sewa->toArray());

      tap($sewa->fresh(), function($sewa){
        $this->get("/staff/sewa/{$sewa->id}")
            ->assertSee("$sewa->id");
        $this->assertEquals($sewa->status, 'berjalan');
        $this->assertEquals($sewa->starts_date, Carbon::now());
        $this->assertEquals($sewa->ends_date, Carbon::now()->addYear());
      });
    }

    /** @test */
    function staff_finish_up_locker_rental_when_student_returns_the_key()
    {
      $sewa =  factory('App\Sewa')->states('berjalan')->create();
      $staff = factory('App\User')->create();

      $this->signIn($staff);

      $this->patch("/staff/sewa/{$sewa->id}/finish");

      $this->assertDatabaseHas('sewa',[
          'id' => $sewa->id,
          'ends_date' => Carbon::now(),
          'status' => 'selesai'
      ]);
    }

    /** @test */
    function filter_rentals_by_id()
    {
      $locker = create('App\Locker');
      $rentalOne = create('App\Sewa',['locker_id' => $locker->id]);
      $rentalTwo = create('App\Sewa');

      $staff = create('App\User');

      $this->signIn($staff);

      $this->get("/staff/sewa?id={$rentalOne->id}")
          ->assertSee($rentalOne->locker_id)
          ->assertDontSee($rentalTwo->locker_id);
    }
}
