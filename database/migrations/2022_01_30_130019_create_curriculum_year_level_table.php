<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumYearLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_curriculum_year_level', function (Blueprint $table) {
            $table->id('cuyl_id');
            $table->timestamp('cuyl_createdAt');
            $table->timestamp('cuyl_updatedAt')->nullable();
            $table->softDeletes('cuyl_deletedAt');
            $table->foreignId('year_cuyl_id');
            $table->foreignId('curr_cuyl_id');

            $table->foreign('year_cuyl_id')->references('year_id')->on('s_year_level');
            $table->foreign('curr_cuyl_id')->references('curr_id')->on('s_curriculum');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_curriculum_year_level');
    }
}
