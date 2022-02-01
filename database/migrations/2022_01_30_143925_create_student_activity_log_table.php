<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentActivityLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_student_log', function (Blueprint $table) {
            $table->id('stlo_id');
            $table->foreignId('aclo_stlo_id');
            $table->foreignId('stud_stlo_id');

            $table->foreign('aclo_stlo_id')->references('aclo_id')->on('t_activity_log');
            $table->foreign('stud_stlo_id')->references('stud_id')->on('r_student');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_student_log');
    }
}
