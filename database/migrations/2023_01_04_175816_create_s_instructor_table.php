<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSInstructorTable extends Migration
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
            $table->string('inst_empNo');
            $table->string('inst_prefix');
            $table->string('inst_firstName');
            $table->string('inst_middleName');
            $table->string('inst_lastName');
            $table->string('inst_suffix');
            $table->timestamps('inst_createdAt');
            $table->timestamps('inst_updatedAt');
            $table->softDeletes('inst_deleteddAt');
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
