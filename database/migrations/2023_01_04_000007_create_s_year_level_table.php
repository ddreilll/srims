<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSYearLevelTable extends Migration
{
    public function up()
    {
        Schema::create('s_year_level', function (Blueprint $table) {
            $table->bigIncrements('year_id');
            $table->string('year_name');
            $table->integer('year_order');
            $table->timestamps('year_createdAt');
            $table->timestamps('year_updatedAt');
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
