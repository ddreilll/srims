<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfereeGradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_transferee_grade', function (Blueprint $table) {
            $table->id('trgr_id');
            $table->string('trgr_subjectCode');
            $table->string('trgr_subjectName');
            $table->decimal('trgr_units', 11, 2, true);
            $table->decimal('trgr_grade', 11, 2, true);
            $table->string('trgr_term');
            $table->year('trgr_acadYear');
            $table->mediumText('trgr_remarks')->nullable();
            $table->timestamp('trgr_createdAt');
            $table->timestamp('trgr_updatedAt')->nullable();
            $table->softDeletes('trgr_deletedAt');
            $table->foreignId('alma_trgr_id');

            $table->foreign('alma_trgr_id')->references('alma_id')->on('r_alma_mater');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_transferee_grade');
    }
}
