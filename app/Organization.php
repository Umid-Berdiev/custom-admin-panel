<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Organization extends Model
{
    use Translatable;

	protected $translatable = ['name', 'description'];

	public function user()
	{
		return $this->hasOne('App\User')->with('posts');
	}

	public function media_channels()
	{
		return $this->hasMany('App\MediaChannel', 'owner_id');
    }

    public function oblast()
    {
        return $this->belongsTo('App\UzRegion', 'region', 'regionid');
    }

    public function rayon()
    {
        return $this->belongsTo('App\UzDistrict', 'district', 'areaid');
    }
}
