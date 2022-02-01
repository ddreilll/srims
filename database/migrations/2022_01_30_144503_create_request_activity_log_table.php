<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestActivityLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_request_log', function (Blueprint $table) {
            $table->id('relo_id');
            $table->string('relo_lastStatus');
            $table->foreignId('aclo_relo_id');
            $table->foreignId('req_relo_id');

            $table->foreign('aclo_relo_id')->references('aclo_id')->on('t_activity_log');
            $table->foreign('req_relo_id')->references('req_id')->on('t_request');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_request_log');
    }
}
