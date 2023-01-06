<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_class', function (Blueprint $table) {
            $table->id('class_id');
            $table->string('class_section');
            $table->year('class_acadYear');
            $table->string('class_fstorage');
            $table->longText('class_flink');
            $table->string('class_fname');
            $table->timestamps('class_createdAt');
            $table->timestamps('class_updatedAt');
            $table->softDeletes('class_deletedAt');
            $table->unsignedBigInteger('class_term_id')->nullable();
            $table->foreign('class_term_id', 'class_term_fk_18024801')->references('term_id')->on('s_term');
            $table->unsignedBigInteger('class_room_id')->nullable();
            $table->foreign('class_room_id', 'class_room_fk_18024802')->references('room_id')->on('s_room');
            $table->unsignedBigInteger('class_subj_id')->nullable();
            $table->foreign('class_subj_id', 'class_subj_fk_18024803')->references('subj_id')->on('s_subject');
            $table->unsignedBigInteger('class_inst_id')->nullable();
            $table->foreign('class_inst_id', 'class_inst_fk_18024804')->references('inst_id')->on('s_instructor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_class');
    }
}
