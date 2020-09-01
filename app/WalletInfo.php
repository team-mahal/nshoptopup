<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletInfo extends Model
{
    protected $fillable = [
        'user_id', 'paymentMethod', 'paymentNumber', 'amount', 'status'
    ];
}
