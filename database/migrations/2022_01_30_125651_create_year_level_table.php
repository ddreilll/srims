<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYearLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_year_level', function (Blueprint $table) {
            $table->id('year_id');
            $table->string('year_name', 50);
            $table->integer('year_order', false, true);
            $table->timestamp('year_createdAt');
            $table->timestamp('year_updatedAt')->nullable();
            $table->softDeletes('year_deletedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_year_level');
    }
}
