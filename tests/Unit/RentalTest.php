<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RentalTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function rental_belongs_to_one_submission()
    {
       $sewa = create('App\Sewa');

       $this->assertInstanceOf('App\RentalsSubmission', $sewa->submission);
    }

    /** @test */
    public function activate_locker_rental()
    {
    	$sewa = create('App\Sewa',['status' => 'pengambilan kunci']);

    	$sewa->activate();

    	$this->assertEquals($sewa->fresh()->status,'berjalan');
    	$this->assertEquals($sewa->fresh()->starts_date,Carbon::now());
    	$this->assertEquals($sewa->fresh()->ends_date,Carbon::now()->addYear());
    }

    /** @test */
    function finishing_up_on_going_locker_rental()
    {
        $sewa =  factory('App\Sewa')->states('berjalan')->create();

        $sewa->finish();

        $this->assertEquals('selesai', $sewa->status);
        $this->assertEquals(Carbon::now(), $sewa->ends_date);
    }
}
