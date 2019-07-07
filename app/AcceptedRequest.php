<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcceptedRequest extends Model
{
/*    protected $table = 'accepted_requests';*/
    protected $fillable = ['ISBN_code','reg_no'];
}
