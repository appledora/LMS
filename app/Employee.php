<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
use Notifiable;

    protected $table = 'employee';

    protected $fillable = ['email',  'password', 'e_name', 'e_codename','designation'];

    protected $hidden = ['password',  'remember_token'];
}
