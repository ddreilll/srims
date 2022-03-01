<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHonorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_honor', function (Blueprint $table) {
            $table->id('honor_id');
            $table->string('honor_name', 200);
            $table->timestamp('honor_createdAt');
            $table->timestamp('honor_updatedAt')->nullable();
            $table->softDeletes('honor_deletedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_honor');
    }
}
