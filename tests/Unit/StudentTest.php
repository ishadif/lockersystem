<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class StudentTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function student_can_have_many_submissions()
	{
      $student = factory('App\Student')->create();

      $this->assertInstanceOf(Collection::class, $student->submissions);
	}

    /** @test */
    public function student_can_apply_submission()
    {
       $student = factory('App\Student')->create();

       $student->applySubmission([
       		'student_id' => $student->id
       ]);

       $this->assertCount(1, $student->submissions);
    }
}
