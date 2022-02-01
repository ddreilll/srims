<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_request', function (Blueprint $table) {
            $table->id('req_id');
            $table->string('req_controlNo', 20)->unique();
            $table->string('req_contactNo', 20)->unique();
            $table->string('req_email')->unique();
            $table->string('req_paymentORNo', 20);
            $table->dateTime('req_dateRequested');
            $table->string('req_purpose', 250);
            $table->enum('req_status', ['SUBMITTED', 'FOR_VALIDATION', 'PARTIALLY_VALIDATED', 'FULLY_VALIDATED', 'FOR_PRINTING', 'RELEASED', 'FOR_PICKUP', 'CLOSED']);
            $table->dateTime('req_dateClaimed');
            $table->string('req_receiverName', 250);
            $table->string('req_receiverRelationship', 50);
            $table->mediumText('req_remarks')->nullable();
            $table->timestamp('req_createdAt');
            $table->timestamp('req_updatedAt')->nullable();
            $table->softDeletes('req_deletedAt');
            $table->foreignId('stud_req_id');

            $table->foreign('stud_req_id')->references('stud_id')->on('r_student');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_request');
    }
}
