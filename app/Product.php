<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'tag_line',
        'description',
        'type',
        'logo'
    ];
}
