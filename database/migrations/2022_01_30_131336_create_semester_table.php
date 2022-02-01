<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemesterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_semester', function (Blueprint $table) {
            $table->id('seme_id');
            $table->year('seme_acadYear');
            $table->timestamp('seme_createdAt');
            $table->timestamp('seme_updatedAt')->nullable();
            $table->softDeletes('seme_deletedAt');
            $table->foreignId('term_seme_id');
            $table->foreignId('stud_seme_id');

            $table->foreign('term_seme_id')->references('term_id')->on('s_term');
            $table->foreign('stud_seme_id')->references('stud_id')->on('r_student');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_semester');
    }
}
