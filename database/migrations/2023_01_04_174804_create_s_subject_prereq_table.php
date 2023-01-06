<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSSubjectPrereqTable extends Migration
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
            $table->timestamps('subjpreq_createdAt');
            $table->timestamps('subjpreq_updatedAt');
            $table->softDeletes('subjpreq_deleteddAt');
            $table->unsignedBigInteger('subj_subjpreq_id')->nullable();
            $table->foreign('subj_subjpreq_id', 'subj_subjpreq_fk_17480401')->references('subj_id')->on('s_subject');
            $table->unsignedBigInteger('subjp_subjpreq_id')->nullable();
            $table->foreign('subjp_subjpreq_id', 'subj_subjpreq_fk_17480402')->references('subj_id')->on('s_subject');
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
