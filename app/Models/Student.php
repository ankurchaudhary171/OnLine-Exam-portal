<?php

namespace App\Models;

 use Illuminate\Foundation\Auth\user as Authenticated;

use Illuminate\Database\Eloquent\Model;

class Student extends Authenticated
{
    protected $table='students';
    protected $fillable = ['name','email','password','role'];
}


