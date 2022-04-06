<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_student', function (Blueprint $table) {
            $table->id('stud_id');
            $table->string('stud_uuid', 200)->unique();
            $table->string('stud_studentNo')->unique();
            $table->string('stud_firstName', 50);
            $table->string('stud_middleName', 50)->nullable();
            $table->string('stud_lastName', 50);
            $table->string('stud_suffix', 10)->nullable();
            $table->string('stud_addressLine', 250);
            $table->string('stud_addressCity', 50);
            $table->string('stud_addressProvince', 50);
            $table->year('stud_yearOfAdmission');
            $table->enum('stud_admissionType', ['FRESHMEN', 'TRANSFEREE']);
            $table->enum('stud_isGraduated', ['YES', 'NO']);
            $table->dateTime('stud_dateGraduated')->nullable();
            $table->string('stud_honor')->nullable();
            $table->enum('stud_recordStatus', ['DRAFT', 'UNVALIDATED', 'PARTIALLY_VALIDATED', 'VALIDATED', 'FOR_CORRECTION'])->default('DRAFT');
            $table->enum('stud_validationStatus', ['NO_VALIDATION', 'PROFILE', 'ENTRANCE_CREDENTIALS', 'ACADEMIC'])->default('NO_VALIDATION');
            $table->mediumText('stud_remarks')->nullable();
            $table->timestamp('stud_createdAt');
            $table->timestamp('stud_updatedAt')->nullable();
            $table->softDeletes('stud_deletedAt');
            $table->foreignId('cour_stud_id')->nullable();
            $table->foreignId('curr_stud_id')->nullable();
            $table->foreignId('user_stud_id')->nullable();

            $table->foreign('cour_stud_id')->references('cour_id')->on('s_course');
            $table->foreign('curr_stud_id')->references('curr_id')->on('s_curriculum');
            $table->foreign('user_stud_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_student');
    }
}
