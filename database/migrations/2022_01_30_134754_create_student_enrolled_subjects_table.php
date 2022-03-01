<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEnrolledSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_student_enrolled_subjects', function (Blueprint $table) {
            $table->id('enrsub_id');
            $table->decimal('enrsub_grade', 11, 2, true)->nullable();
            $table->enum('enrsub_otherGrade', ['W', 'D', 'INC'])->nullable();
            $table->mediumText('enrsub_remarks')->nullable();
            $table->enum('enrsub_status', ['DRAFT', 'UNVALIDATED', 'VALIDATED', 'FOR_CORRECTION'])->default('DRAFT');
            $table->timestamp('enrsub_createdAt');
            $table->timestamp('enrsub_updatedAt')->nullable();
            $table->softDeletes('enrsub_deletedAt');
            $table->foreignId('sche_enrsub_id')->nullable();
            $table->foreignId('stud_enrsub_id')->nullable();

            $table->foreign('stud_enrsub_id')->references('stud_id')->on('r_student');
            $table->foreign('sche_enrsub_id')->references('sche_id')->on('s_schedule');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_student_enrolled_subjects');
    }
}
