<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Post extends Model
{
    use Translatable;
	
	protected $guarded = [];

	public function categories() {
		return $this->belongsToMany('App\Category');
	}

	public function author() {
		return $this->belongsTo('App\User');
	}
}
