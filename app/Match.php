<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
		'status'
	];

	public function product()
	{
		return $this->belongsTo("App\Product");
	}

	public function users()
	{
		return $this->hasMany("App\Matchuser");
	}

}
