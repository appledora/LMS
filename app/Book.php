<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{		use \Conner\Tagging\Taggable;

    protected $table = 'book';
    protected $fillable = ['title' , 'isbn','edition','author', 'available' ];
}
