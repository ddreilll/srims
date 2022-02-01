<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTimeSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_time_slot', function (Blueprint $table) {
            $table->id('time_id');
            $table->string('time_day', 10)->nullable();
            $table->string('time_duration', 50)->nullable();
            $table->timestamp('time_createdAt');
            $table->timestamp('time_updatedAt')->nullable();
            $table->softDeletes('time_deletedAt');
            $table->foreignId('sche_time_id');

            $table->foreign('sche_time_id')->references('sche_id')->on('s_schedule');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_time_slot');
    }
}
