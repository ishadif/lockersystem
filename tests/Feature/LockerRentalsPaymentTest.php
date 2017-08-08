<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LockerRentalsPaymentTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function student_pays_rental_tuition_fee_when_rental_status_is_payment()
    {
    	$rental = factory('App\Sewa')->create();
    	$payment = factory('App\RentalPayment')->make(['sewa_id' => $rental->id]);

        $this->signIn();

    	$this->post("/staff/sewa/{$rental->id}/payment", $payment->toArray())
    		->assertRedirect('staff/payment')
    		->assertSee("$payment->sewa_id");

    	$this->assertEquals($rental->fresh()->status,'pengambilan kunci');
    }
}
