<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSTimeSlotTable extends Migration
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
            $table->string('time_day');
            $table->string('time_duration');
            $table->timestamps('time_createdAt');
            $table->timestamps('time_updateddAt');
            $table->softDeletes('time_deletedAt');
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
