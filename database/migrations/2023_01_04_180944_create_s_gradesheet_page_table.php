<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSGradesheetPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_gradesheet_page', function (Blueprint $table) {
            $table->id('grdsheetpg_id');
            $table->integer('grdsheetpg_rowNo');
            $table->string('grdsheetpg_flink');
            $table->string('grdsheetpg_fname');
            $table->timestamps('grdsheetpg_createdAt');
            $table->timestamps('grdsheetpg_updatedAt');
            $table->softDeletes('grdsheetpg_deletedAt');
            $table->unsignedBigInteger('grdsheetpg_gradesheet_id')->nullable();
            $table->foreign('grdsheetpg_gradesheet_id', 'grdsheetpg_gradesheet_fk_18094401')->references('class_id')->on('s_class');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_gradesheet_page');
    }
}
