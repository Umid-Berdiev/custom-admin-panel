<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Organization extends Model
{
    use Translatable;

	protected $translatable = ['name', 'description'];

	public function users()
	{
		return $this->hasMany('App\User');
	}
}
