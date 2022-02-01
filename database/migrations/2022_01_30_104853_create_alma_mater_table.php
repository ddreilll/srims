<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmaMaterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_alma_mater', function (Blueprint $table) {
            $table->id('alma_id');
            $table->string('alma_name', 100);
            $table->enum('alma_educType', ['PRIMARY', 'SECONDARY', 'TERTIARY']);
            $table->year('alma_yearExit');
            $table->timestamp('alma_createdAt');
            $table->timestamp('alma_updatedAt')->nullable();
            $table->softDeletes('alma_deletedAt');
            $table->foreignId('stud_alma_id');

            $table->foreign('stud_alma_id')->references('stud_id')->on('r_student');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_alma_mater');
    }
}
