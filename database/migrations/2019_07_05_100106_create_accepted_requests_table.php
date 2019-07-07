<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcceptedRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accepted_requests', function (Blueprint $table) {
/*            $table->bigIncrements('id');*/
            $table->string('reg_no') ->nullable();
            $table->string('ISBN_code')->nullable();
            $table->foreign('reg_no')->references('reg_no') ->on('Student') ->onDelete('cascade')-> string();
            $table->foreign('ISBN_code') ->references('ISBN_code')->on('booktests') ->onDelete('cascade') ->string();
            $table->date('issue_date');
            $table->date('return_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accepted_requests');
    }
}
