<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [
       
    ];

    public function brand()
    {
    	return $this->belongsTo('App\Brand');
    }
}
