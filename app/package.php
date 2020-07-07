<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    protected $fillable = [
        'name',
        'buy_price',
        'sale_price',
        'product_id'
    ];
}
