<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSRoomTable extends Migration
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
            $table->string('room_name');
            $table->timestamps('room_createdAt');
            $table->timestamps('room_updatedAt');
            $table->softDeletes('room_deleteddAt');
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
