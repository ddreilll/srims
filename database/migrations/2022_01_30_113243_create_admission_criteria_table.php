<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_admission_criteria', function (Blueprint $table) {
            $table->id('adcr_id');
            $table->year('adcr_yearStart');
            $table->year('adcr_yearEnd');
            $table->timestamp('adcr_createdAt');
            $table->timestamp('adcr_updatedAt')->nullable();
            $table->softDeletes('adcr_deletedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_admission_criteria');
    }
}