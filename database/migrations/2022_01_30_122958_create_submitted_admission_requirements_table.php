<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmittedAdmissionRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_submitted_adm_req', function (Blueprint $table) {
            $table->id('subm_id');
            $table->longText('subm_href');
            $table->enum('subm_status', ['SUBMITTED', 'NOT_SUBMITTED']);
            $table->mediumText('subm_remarks')->nullable();
            $table->dateTime('subm_dateSubmitted');
            $table->timestamp('subm_createdAt');
            $table->timestamp('subm_updatedAt')->nullable();
            $table->foreignId('stud_subm_id');
            $table->foreignId('adre_subm_id');

            $table->foreign('stud_subm_id')->references('stud_id')->on('r_student');
            $table->foreign('adre_subm_id')->references('adre_id')->on('s_admission_req');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_submitted_adm_req');
    }
}
