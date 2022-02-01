<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumSemesterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_curriculum_sem', function (Blueprint $table) {
            $table->id('cuse_id');
            $table->timestamp('cuse_createdAt');
            $table->timestamp('cuse_updatedAt')->nullable();
            $table->softDeletes('cuse_deletedAt');
            $table->foreignId('curr_cuse_id');
            $table->foreignId('term_cuse_id');

            $table->foreign('curr_cuse_id')->references('curr_id')->on('s_curriculum');
            $table->foreign('term_cuse_id')->references('term_id')->on('s_term');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_curriculum_sem');
    }
}
