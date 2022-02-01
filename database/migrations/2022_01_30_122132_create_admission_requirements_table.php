<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_admission_req', function (Blueprint $table) {
            $table->id('adre_id');
            $table->string('adre_docuCode', 50);
            $table->string('adre_docuName', 200);
            $table->longText('adre_docuDescription')->nullable();
            $table->timestamp('adre_createdAt');
            $table->timestamp('adre_updatedAt')->nullable();
            $table->softDeletes('adre_deletedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_admission_req');
    }
}
