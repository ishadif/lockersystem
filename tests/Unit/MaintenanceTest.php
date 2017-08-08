<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class MaintenanceTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function it_finishes_locker_maintenance_process()
    {
    	$maintenance = create('App\Maintenance');

    	$maintenance->finished();

    	$this->assertEquals($maintenance->ends_date, Carbon::now());
        $this->assertEquals($maintenance->status, 'selesai');
    }
}
