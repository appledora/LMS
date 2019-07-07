<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssueRequest extends Model
{
/*    protected $table = 'issue_requests';*/
    protected $fillable = ['ISBN_code','reg_no'];

}
