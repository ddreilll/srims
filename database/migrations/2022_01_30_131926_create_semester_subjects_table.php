<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemesterSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_semester_subj', function (Blueprint $table) {
            $table->id('sesu_id');
            $table->decimal('sesu_grade_1', 1, 1, true);
            $table->decimal('sesu_grade_2', 1, 1, true);
            $table->string('sesu_remarks', 10);
            $table->timestamp('sesu_createdAt');
            $table->timestamp('sesu_updatedAt')->nullable();
            $table->softDeletes('sesu_deletedAt');
            $table->foreignId('seme_sesu_id');
            $table->foreignId('subj_sesu_id');

            $table->foreign('seme_sesu_id')->references('seme_id')->on('t_semester');
            $table->foreign('subj_sesu_id')->references('subj_id')->on('s_subject');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_semester_subj');
    }
}
