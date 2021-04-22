<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Failed_order extends Model
{
    protected $fillable = [
        'Name', 'Lastname', 'Cedula', 'Estado','city','phone','email','delivery','payment',
    ];
}
