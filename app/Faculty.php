<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Faculty extends Authenticatable
{
    use Notifiable;

    protected $table = 'faculty';

    protected $fillable = ['email',  'password', 'f_name', 'f_codename','f_designation'];

    protected $hidden = ['password',  'remember_token'];
}
