<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooktestsTable extends Migration
{
    
    public function up()
    {   
        //BookId changed to id
        Schema::create('booktests', function (Blueprint $table) {
/*            $table->bigIncrements('id');*/
            $table->string('title');
            $table->string('ISBN_code');
            $table->primary('ISBN_code');
            $table->string('author');
            $table->integer('edition');
            $table->string('category');
            $table->integer('noOfCopies');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('booktests');
    }
}
