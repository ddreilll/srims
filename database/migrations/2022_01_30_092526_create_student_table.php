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
            $table->string('stud_studentNo')->nullable();
            $table->string('stud_firstName', 50);
            $table->string('stud_middleName', 50)->nullable();
            $table->string('stud_lastName', 50);
            $table->string('stud_suffix', 10)->nullable();
            $table->string('stud_addressLine', 250);
            $table->string('stud_addressCity', 50);
            $table->string('stud_addressProvince', 50);
            $table->year('stud_yearAdmitted');
            $table->year('stud_yearGraduated')->nullable();
            $table->string('stud_latinHonor')->nullable();
            $table->enum('stud_recordStatus', ['DRAFT', 'SUBMITTED', 'UNVALIDATED', 'PARTIALLY_VALIDATED', 'VALIDATED'])->default('DRAFT');
            $table->enum('stud_validationLevel', ['0', '1', '2', '3'])->default('0')->comment('0 = "No Validation performed", 1 = "Validated Admission Credentials", 2 = "Validated Academic records", 3 = "Validated both 1&2"');
            $table->mediumText('stud_remarks')->nullable();
            $table->timestamp('stud_createdAy');
            $table->timestamp('stud_updatedAt')->nullable();
            $table->softDeletes('stud_deletedAt');
            $table->foreignId('cour_stud_id');
            $table->foreignId('curr_stud_id');

            $table->foreign('cour_stud_id')->references('cour_id')->on('s_course');
            $table->foreign('curr_stud_id')->references('curr_id')->on('s_curriculum');
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
