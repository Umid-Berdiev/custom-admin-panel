<?php

namespace App\Http\Controllers;

use App\Organization;
use TCG\Voyager\Models\Page;
use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PagesController extends Controller
{
	/**
	 * get the specified resource.
	 *
	 * @param $slug
	 * @return \Illuminate\Http\Response
	 */
	public function getPage($slug = null, $locale)
	{
		$page = Page::where('slug', $slug)->where('status', 'ACTIVE')->withTranslations($locale)->firstOrFail();
		// dd($page);

		return view('pages.page_template', compact('page'));
	}

	/**
	 * get the specified resource.
	 *
	 * @param
	 * @return \Illuminate\Http\Response
	 */
	public function homePage($locale)
	{
		$posts = Post::with(['categories', 'author'])->withTranslations($locale)->latest()->get();
		$categories = Category::with('posts')->withTranslations($locale)->get();
		$post_categories = Category::where('parent_id', 4)->withTranslations($locale)->get();
        $orgs = Organization::with(['users', 'media_channels'])->withTranslations($locale)->get();

		return view('pages.home', compact('posts', 'categories', 'post_categories', 'orgs'));
	}

    public function directoriesPage(Request $request, $locale)
    {
        return view('pages.directories');
	}

    public function infodigestPage(Request $request, $locale)
    {
        $posts = Post::with(['categories', 'author'])->withTranslations($locale)->get();
        return view('pages.infodigest', compact('posts'));
	}

	public function getCurrencies(Request $request)
	{
		// $last = DB::table('translate')->where('name', $request->data)->first();
		// $date = new DateTime($last->timestamps ?? "2019-01-01");
		// $current = time();
		$usdData = file_get_contents("https://cbu.uz/uz/arkhiv-kursov-valyut/json/$request->data/");
		/*if (($current - $date->getTimestamp()) >= 604800) {
			if ($usdData != null) {
				DB::table('currencies')->insert(
					['name' => $request, 'value' => $usdData]
				);
			}
		}*/
		// dd($usdData);
		// file_put_contents("E:/OSPanel/domains/custom-admin-panel/public/usd.json", json_encode($usdData, JSON_UNESCAPED_UNICODE));

		return json_encode($usdData);
    }

    public function getRegions(Request $request)
    {
        $regions = \App\UzRegion::all();
        return response()->json($regions, 200);
    }


}
