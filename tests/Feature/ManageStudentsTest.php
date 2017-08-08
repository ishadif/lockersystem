<?php

namespace Tests\Feature;

use App\Mail\StudentCreatedMail;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ManageStudentsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function authenticated_staff_can_create_new_student()
    {
        Mail::fake();

    	$staff = create('App\User');
    	$prodi = create('App\StudyProgram',['name' => 'sistem informasi']);
    	$student = make('App\Student',[
    		'name' => 'ishadi',
    		'study_program_id' => $prodi->id
    	]);

    	$this->signIn($staff);

    	$this->post('/staff/students', $student->toArray());

    	$this->assertDatabaseHas('students',['name' => 'ishadi','study_program_id' => $prodi->id]);

        Mail::assertSent(StudentCreatedMail::class, function($mail) use ($student) {
            return $mail->hasTo($student->email) && $mail->id = $student->id;
        });

    	$this->get('/staff/students')
    		->assertSee('ishadi');

    }
}
