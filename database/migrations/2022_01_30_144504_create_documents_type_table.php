<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_documents_type', function (Blueprint $table) {
            $table->id('docuType_id');
            $table->string('docuType_name');
            $table->foreignId('docuType_document');
            $table->timestamp('docuType_createdAt')->default(NOW());
            $table->timestamp('docuType_updatedAt')->nullable();
            $table->softDeletes('docuType_deletedAt');

            $table->foreign('docuType_document')->references('docu_id')->on('s_documents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_documents_type');
    }
}
