<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleInstructorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_instructor', function (Blueprint $table) {
            $table->id('inst_id');
            $table->string('inst_empNo', 20);
            $table->string('inst_prefix', 10)->nullable();
            $table->string('inst_firstName', 50);
            $table->string('inst_middleName', 50)->nullable();
            $table->string('inst_lastName', 50);
            $table->string('inst_suffix', 10)->nullable();
            $table->timestamp('inst_createdAt');
            $table->timestamp('inst_updatedAt')->nullable();
            $table->softDeletes('inst_deletedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_instructor');
    }
}
