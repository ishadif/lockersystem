<?php

namespace Tests;

use App\Exceptions\Handler;
use App\RolePolicies;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    
    protected function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();

        // $role = create('App\Role',['name' => 'kemahasiswaan']);
        // $permission = create('App\Permission',['name' => 'update_sewa']);

        // $role->givePermissionTo($permission);

        // RolePolicies::define();
    }

    protected function disableExceptionHandling()
    {
        $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);

        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct() {}
            public function report(\Exception $e) {}
            public function render($request, \Exception $e) {
                throw $e;
            }
        });
    }

    protected function withExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);

        return $this;
    }

    protected function signIn($student = null, $guard = null)
    {
        $student = $student ?: create('App\Student');

        $this->actingAs($student, $guard);

        return $this;
    }
}
