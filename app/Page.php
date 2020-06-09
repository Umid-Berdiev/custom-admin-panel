<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Traits\Translatable;

class Page extends \TCG\Voyager\Models\Page
{
    use Translatable;

    protected $translatable = ['title', 'excerpt', 'slug', 'body'];

}
