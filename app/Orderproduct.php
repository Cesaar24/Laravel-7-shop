<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderproduct extends Model
{
     protected $fillable = [
       'id_order','id_product','quantity',
    ];
}
