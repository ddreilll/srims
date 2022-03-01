<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectTable extends Migration
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
            $table->string('subj_code', 50);
            $table->string('subj_name', 200);
            $table->decimal('subj_units', 11, 1, true);
            $table->timestamp('subj_createdAt');
            $table->timestamp('subj_updatedAt')->nullable();
            $table->softDeletes('subj_deletedAt');
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
