<?php

namespace App\Http\Controllers\Voyager;

use Exception;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataRestored;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
use App\Post;

class PostController extends VoyagerBaseController
{
	use BreadRelationshipParser;

	public function singlePostShow($id, $locale)
	{
		$post = Post::whereId($id)->with('author')->withTranslations($locale)->first();
		$posts = Post::take(4)->withTranslations($locale)->get();
		$other_posts = Post::take(4)->withTranslations($locale)->get();

		return view('pages/single_post', compact('post', 'posts', 'other_posts'));
	}

}
