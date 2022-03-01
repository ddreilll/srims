<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolYearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_school_year', function (Blueprint $table) {
            $table->id('syear_id');
            $table->year('syear_year');
            $table->timestamp('syear_createdAt');
            $table->timestamp('syear_updatedAt')->nullable();
            $table->softDeletes('syear_deletedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_school_year');
    }
}