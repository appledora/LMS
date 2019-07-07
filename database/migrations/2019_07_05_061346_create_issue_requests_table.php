<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no')->nullable();
            $table->string('f_codename')->nullable();
            $table->string('ISBN_code')->nullable();
            $table->string('book_title');

            $table->foreign('reg_no')->references('reg_no') ->on('Student') -> string();
            $table->foreign('ISBN_code') ->references('ISBN_code')->on('booktests') ->string();
            $table->foreign('f_codename')->references('f_codename')->on('faculty')->string();
            $table->timestamps();
        });

      /* Schema::table('issue_requests', function($table)
        {
            $table->foreign('ISBN_code')
                ->references('ISBN_code')->on('booktests')
                ->onDelete('cascade');

            $table->foreign('reg_no')
                ->references('reg_no')->on('Student')
                ->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issue_requests');
    }
}
