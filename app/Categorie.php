<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'category_id', 'Name', 'pic',
    ];
    public $timestamps = false;
}
