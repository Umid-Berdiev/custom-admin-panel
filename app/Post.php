<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Post extends Model
{
    use Translatable;

    protected $guarded = [];

    protected $translatable = ['title', 'seo_title', 'excerpt', 'body', 'slug', 'meta_description', 'meta_keywords'];

    public function categories() {
		return $this->belongsToMany('App\Category');
	}

	public function author() {
		return $this->belongsTo('App\User');
	}
}
