<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = [
        'name',
        'number',
        'logo',
        'discount',
        'currency',
        'des',
    ];
}
