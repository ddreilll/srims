<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_document', function (Blueprint $table) {
            $table->id('docu_id');
            $table->string('docu_name');
            $table->longText('docu_description');
            $table->string('docu_category');
            $table->string('docu_isPermanent');
            $table->timestamps('docu_createdAt');
            $table->timestamps('docu_updatedAt');
            $table->softDeletes('docu_deletedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_document');
    }
}
