<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Page;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Organization;
use Illuminate\Database\Eloquent\Builder;

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
		$posts = Post::with('categories', 'author.organization.oblast')->withTranslations($locale)->latest()->take(6)->get();
		$categories = Category::with('posts')->withTranslations($locale)->get();
		$post_categories = Category::where('parent_id', 4)->withTranslations($locale)->get();
        $orgs = Organization::with('user', 'media_channels')->withTranslations($locale)->get();
        $regions = \App\UzRegion::all();

		return view('pages.home', compact(
            'posts',
            'categories',
            'post_categories',
            'orgs',
            'regions'
        ));
	}

    public function directoriesPage(Request $request, $locale)
    {
        $regions = \App\UzRegion::all();
        $orgs = Organization::with('user', 'media_channels')->withTranslations($locale)->get();
        $org_category = Category::whereId(18)
            ->with(['children.organizations.media_channels', 'children.organizations.user'])
            ->withTranslations($locale)->first();

        return view('pages.directories', compact('regions', 'org_category', 'orgs'));
	}

    public function infodigestPage(Request $request, $locale)
    {
        $categories = Category::where('parent_id', 4)->with('posts')->withTranslations($locale)->get();
        $organizations = Organization::with('user', 'media_channels')->withTranslations($locale)->get();
        $regions = \App\UzRegion::all();
        $result = Post::with('categories', 'author')->withTranslations($locale)->latest()->get();
        $selectedCats = [];
        $selectedOrgs = [];

        return view('pages.infodigest', compact('categories', 'organizations', 'regions', 'result', 'selectedCats', 'selectedOrgs'));
    }

    public function postsPage(Request $request, $locale)
    {
        $posts = Post::latest()->with('author.organization.media_channels', 'categories')->withTranslations($locale)->paginate(8);
        $regions = \App\UzRegion::all();

        return view('pages.posts', compact('posts', 'regions'));
    }

    public function singlePostPage($id, $locale)
	{
		$post = Post::whereId($id)->with('author.organization.media_channels')->withTranslations($locale)->first();
		$posts = Post::latest()->take(4)->withTranslations($locale)->get();
		$other_posts = Post::latest()->take(4)->withTranslations($locale)->get();
        $regions = \App\UzRegion::all();
        $orgs = Organization::with('user', 'media_channels')->withTranslations($locale)->get();
		$post_categories = Category::where('parent_id', 4)->withTranslations($locale)->get();

		return view('pages.single_post', compact('post', 'posts', 'other_posts', 'regions', 'orgs', 'post_categories'));
	}

	public function getRegions(Request $request)
    {
        $regions = \App\UzRegion::all();

        return response()->json($regions, 200);
    }

	public function getFilteredPosts(Request $request)
    {
        $locale = app()->getLocale();
        $posts = Post::latest();
        $categories = [];
        $organizations = [];
        $result = [];

        if ($request->cats && $request->cats[0]) {
            $posts = $posts->whereHas('categories', function (Builder $query) use($request) {
                $query->whereIn('category_id', $request->cats);
            });
        }

        if ($request->orgs && $request->orgs[0]) {
            $posts = $posts->whereHas('author.organization', function (Builder $query) use($request) {
                $query->whereIn('id', $request->orgs);
            });
        }

        if ($request->regionId) {
            $posts = $posts->whereHas('author.organization', function (Builder $query) use($request) {
                $query->where('region', $request->regionId);
            });
        }

        $result = $posts->with('categories', 'author.organization.oblast')->withTranslations($locale)->latest()->get();
        // dd($result);
        return response()->json($result, 200);
    }

	public function redirectFromHomeToInfodigest(Request $request)
    {
        $req = array_filter($request->all());
        $locale = app()->getLocale();
        $result = [];
        $selectedCats = $request->selectedCats;
        $selectedOrgs = $request->selectedOrgs;
        $posts = Post::latest();
        $categories = [];
        $organizations = [];

        if ($selectedCats) {
            $posts = $posts->whereHas('categories', function (Builder $query) use($selectedCats) {
                $query->whereIn('category_id', $selectedCats);
            });
        }

        if ($selectedOrgs) {
            $posts = $posts->whereHas('author.organization', function (Builder $query) use($selectedOrgs) {
                $query->whereIn('id', $selectedOrgs);
            });
        }

        if ($request->regionId) {
            $posts = $posts->whereHas('author.organization', function (Builder $query) use($request) {
                $query->where('region', $request->regionId);
            });
        }

        $result = $posts->with('categories', 'author.organization.oblast')->withTranslations($locale)->latest()->get();

        $categories = Category::where('parent_id', 4)->with('posts')->withTranslations($locale)->get();
        $organizations = Organization::with('user', 'media_channels')->withTranslations($locale)->get();
        $regions = \App\UzRegion::all();

        return view('pages.infodigest', compact('posts', 'categories', 'organizations', 'regions', 'result', 'selectedCats', 'selectedOrgs'));

    }

}
