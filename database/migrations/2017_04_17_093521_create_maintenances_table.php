<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->unsignedInteger('maintenances_submission_id');
            $table->unsignedInteger('sewa_id');
            $table->string('locker_id');
            $table->string('maintenance_type', 50);
            $table->string('status');
            $table->date('starts_date')->nullable();
            $table->date('ends_date')->nullable();
            $table->timestamps();

            $table->foreign('maintenances_submission_id')
                ->references('id')
                ->on('maintenances_submissions')
                ->onDelete('cascade');

            $table->foreign('student_id')
                ->references('id')
                ->on('students')
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
        Schema::dropIfExists('maintenances');
    }
}
