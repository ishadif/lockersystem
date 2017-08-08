<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenancesSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances_submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sewa_id');
            $table->string('locker_id');
            $table->integer('student_id');
            $table->string('maintenance_type');
            $table->text('description')->nullable();
            $table->boolean('approved')->default(false);
            $table->date('processed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenances_submissions');
    }
}
