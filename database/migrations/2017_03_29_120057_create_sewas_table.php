<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->unsignedInteger('rental_submission_id');
            $table->string('locker_id');
            $table->string('status');
            $table->date('starts_date')->nullable();
            $table->date('ends_date')->nullable();
            $table->timestamps();

            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');

            $table->foreign('locker_id')
                ->references('id')
                ->on('lockers')
                ->onDelete('cascade');

            $table->foreign('rental_submission_id')
                ->references('id')
                ->on('rentals_submissions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sewa');
    }
}
