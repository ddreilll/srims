<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_room', function (Blueprint $table) {
            $table->id('room_id');
            $table->string('room_name', 50);
            $table->timestamp('room_createdAt');
            $table->timestamp('room_updatedAt')->nullable();
            $table->softDeletes('room_deletedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_room');
    }
}
