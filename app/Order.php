<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status',
    ];

    public function paymentm()
    {
    	 return $this->belongsTo("App\PaymentMethod",'payment_method');
    }
}
