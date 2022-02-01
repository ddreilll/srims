<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_course', function (Blueprint $table) {
            $table->id('cour_id');
            $table->string('cour_code', 50);
            $table->string('cour_name', 200);
            $table->timestamp('cour_createdAt');
            $table->timestamp('cour_updatedAt')->nullable();
            $table->softDeletes('cour_deletedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_course');
    }
}
