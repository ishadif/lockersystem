<?php

namespace Tests\Unit;

use App\Locker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LockerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function it_fetches_only_lockers_that_available()
    {
    	$available = create('App\Locker', [], 3);
    	$unavailable = create('App\Locker', ['available' => false], 2);

    	$lockers = Locker::available()->get();

    	$this->assertCount(3, $lockers);
    }

    /** @test */
    function it_changes_locker_to_be_unavailable()
    {
    	$locker = create('App\Locker');

    	$locker->hasBeenRented();

    	$this->assertEquals(false , $locker->available);
    }
}
