<?php

namespace Tests\Feature;

use App\Locker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class LockersTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function staff_can_add_new_locker()
    {
    	$locker = make(Locker::class,['id' => 'STD-1093']);

    	$this->post('/staff/lockers', $locker->toArray());

    	$this->assertDatabaseHas('lockers',['id' => 'STD-1093','available' => true]);
    }
}
