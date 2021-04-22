<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Success_order extends Model
{
   protected $fillable = [
        'id','Name', 'Lastname', 'Cedula', 'Estado','city','phone','email','delivery','payment',
    ];
}
