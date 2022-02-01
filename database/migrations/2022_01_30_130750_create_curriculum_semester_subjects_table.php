<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumSemesterSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_curriculum_sem_subj', function (Blueprint $table) {
            $table->id('cssj_id');
            $table->timestamp('cssj_createdAt');
            $table->timestamp('cssj_updatedAt')->nullable();
            $table->softDeletes('cssj_deletedAt');
            $table->foreignId('subj_cssj_id');
            $table->foreignId('cuse_cssj_id');

            $table->foreign('subj_cssj_id')->references('subj_id')->on('s_subject');
            $table->foreign('cuse_cssj_id')->references('cuse_id')->on('s_curriculum_sem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_curriculum_sem_subj');
    }
}
