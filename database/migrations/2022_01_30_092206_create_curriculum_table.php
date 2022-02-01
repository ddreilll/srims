<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_curriculum', function (Blueprint $table) {
            $table->id('curr_id');
            $table->string('curr_code', 20);
            $table->year('curr_yearStart');
            $table->year('curr_yearEnd');
            $table->timestamp('curr_createdAt');
            $table->timestamp('curr_updatedAt')->nullable();
            $table->softDeletes('curr_deletedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_curriculum');
    }
}
