<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UzDistrict extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function region()
    {
        return $this->belongsTo('App\UzRegion', 'regionid', 'regionid');
    }
}
