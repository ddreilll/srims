<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_subject', function (Blueprint $table) {
            $table->id('subj_id');
            $table->string('subj_code');
            $table->string('subj_name');
            $table->double('subj_units', 8, 2);
            $table->timestamps('subj_createdAt');
            $table->timestamps('subj_updatedAt');
            $table->softDeletes('subj_deleteddAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_subject');
    }
}
