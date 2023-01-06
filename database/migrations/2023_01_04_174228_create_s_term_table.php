<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSTermTable extends Migration
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
            $table->integer('term_order');
            $table->string('term_name');
            $table->timestamps('term_createdAt');
            $table->timestamps('term_updatedAt');
            $table->softDeletes('term_deleteddAt');
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
