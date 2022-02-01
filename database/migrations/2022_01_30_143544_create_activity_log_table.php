<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_activity_log', function (Blueprint $table) {
            $table->id('aclo_id');
            $table->mediumText('aclo_description');
            $table->enum('aclo_type', ['STUDENT_RECORDS', 'REQUEST']);
            $table->dateTime('aclo_lastUpdate')->nullable();
            $table->timestamp('aclo_createdAt');
            $table->timestamp('aclo_updatedAt')->nullable();
            $table->softDeletes('aclo_deletedAt');
            $table->foreignId('user_aclo_id');

            $table->foreign('user_aclo_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_activity_log');
    }
}
