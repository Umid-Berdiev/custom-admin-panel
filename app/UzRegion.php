<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UzRegion extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function districts()
    {
        return $this->hasMany('App\UzDistricts', 'regionid', 'regionid');
    }

}
