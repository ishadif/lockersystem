<?php

namespace Tests\Unit;

use App\RentalPayment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RentalPaymentTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function rental_payment_only_associated_with_one_rental()
    {
    	$payment = factory('App\RentalPayment')->create();

    	$this->assertInstanceOf('App\Sewa', $payment->rental);
    }
    /** @test */
    public function student_pays_the_rent()
    {
    	$rental = factory('App\Sewa')->create();
    	$payment = (new RentalPayment)->payFor($rental->id, 50000);

    	$this->assertEquals($rental->id, $payment->sewa_id);
    }
}
