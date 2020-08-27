<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop_details extends Model
{
    protected $fillable = [
        'quantity',
        'user_id',
        'buy_price',
        'sale_price',
        'invoice_id'
    ];
}
