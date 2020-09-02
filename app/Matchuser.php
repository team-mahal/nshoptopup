<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matchuser extends Model
{
    protected $fillable = [
		'lavel_earn', 'total_kill', 'total_earn', 
	];
}
