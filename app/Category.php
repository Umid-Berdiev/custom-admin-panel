<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Category extends Model
{
    use Translatable;

	protected $translatable = ['name', 'slug'];

	protected $guarded = [];

	public function posts()
	{
		return $this->belongsToMany('App\Post')->latest();
	}
}
