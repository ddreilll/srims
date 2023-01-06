<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSSchoolYearTable extends Migration
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
            $table->timestamps('syear_createdAt');
            $table->timestamps('syear_updatedAt');
            $table->softDeletes('syear_deleteddAt');
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
