<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CreateStaffTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    function staff_only_has_one_role()
    {
    	$role = create('App\Role',['name' => 'kemahasiswaan']);
        $staff = create('App\User');
        $staff->assignRole($role);
        $newStaff = make('App\User',['name' => 'john doe','role_id' => $role->id]);

    	$this->signIn($staff);

    	$this->post('/staff/register', $newStaff->toArray());

    	$this->assertDatabaseHas('users',[
    		'name' => 'john doe',
    	]);

    	$this->get('/staff/users')
    		->assertSee('john doe');
    }
}
