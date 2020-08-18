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

	public function parent()
	{
		return $this->belongsTo('App\Category');
	}

	public function children()
	{
		return $this->hasMany('App\Category', 'parent_id', 'id');
	}

	public function organizations()
	{
		return $this->hasMany('App\Organization', 'category_id', 'id');
	}
}
