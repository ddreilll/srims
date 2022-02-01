<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionRequirementsCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_admission_req_criteria', function (Blueprint $table) {
            $table->id('arcr_id');
            $table->foreignId('adcr_arcr_id');
            $table->foreignId('adre_arcr_id');
            $table->timestamp('arcr_createdAt');
            $table->timestamp('arcr_updatedAt')->nullable();
            $table->softDeletes('arcr_deletedAt');

            $table->foreign('adcr_arcr_id')->references('adcr_id')->on('s_admission_criteria');
            $table->foreign('adre_arcr_id')->references('adre_id')->on('s_admission_req');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_admission_req_criteria');
    }
}
