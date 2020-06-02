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

	public function media_channels()
	{
		return $this->hasMany('App\MediaChannel', 'owner_id');
	}
}
