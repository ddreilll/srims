<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectPrerequisiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_subject_prereq', function (Blueprint $table) {
            $table->id('subjpreq_id');
            $table->timestamp('subjpreq_createdAt');
            $table->timestamp('subjpreq_updatedAt')->nullable();
            $table->softDeletes('subjpreq_deletedAt');
            $table->foreignId('subj_subjpreq_id');
            $table->foreignId('subjp_subjpreq_id');

            $table->foreign('subj_subjpreq_id')->references('subj_id')->on('s_subject');
            $table->foreign('subjp_subjpreq_id')->references('subj_id')->on('s_subject');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_subject_prereq');
    }
}
