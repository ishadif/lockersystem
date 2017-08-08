<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LockerMaintenancePaymentsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function student_pay_locker_maintenance_fee()
    {
    	$maintenance = create('App\Maintenance',[
    		'status' => 'pembayaran',
    		'maintenance_type' => 'pergantian kunci'
    	]);
    	$payment = make('App\MaintenancePayment',['maintenance_id' => $maintenance->id]);

    	$this->post("/staff/maintenance/{$maintenance->id}/payment", $payment->toArray());

    	$this->assertEquals($maintenance->fresh()->status, 'berjalan');
    }
}
