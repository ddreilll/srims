<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_term', function (Blueprint $table) {
            $table->id('term_id');
            $table->integer('term_order', false, true);
            $table->string('term_name', 50);
            $table->timestamp('term_createdAt');
            $table->timestamp('term_updatedAt')->nullable();
            $table->softDeletes('term_deletedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_term');
    }
}
