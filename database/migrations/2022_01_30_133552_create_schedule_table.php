<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_schedule', function (Blueprint $table) {
            $table->id('sche_id');
            $table->string('sche_section', 20)->nullable();
            $table->year('sche_acadYear');
            $table->timestamp('sche_createdAt');
            $table->timestamp('sche_updatedAt')->nullable();
            $table->softDeletes('sche_deletedAt');
            $table->foreignId('term_sche_id');
            $table->foreignId('room_sche_id')->nullable();
            $table->foreignId('subj_sche_id');
            $table->foreignId('inst_sche_id');

            $table->foreign('term_sche_id')->references('term_id')->on('s_term');
            $table->foreign('room_sche_id')->references('room_id')->on('s_room');
            $table->foreign('subj_sche_id')->references('subj_id')->on('s_subject');
            $table->foreign('inst_sche_id')->references('inst_id')->on('s_instructor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_schedule');
    }
}
