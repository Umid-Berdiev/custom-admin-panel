<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Page;
use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PagesController extends Controller
{
    public function grapesStore()
    {
        $data = request()->all();
        // dd($data);
    }

    public function grapesLoad()
    {
        //
    }

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
        $posts = Post::with(['categories', 'author'])->withTranslations($locale)->get();
        $categories = Category::with('posts')->withTranslations($locale)->get();
        $post_categories = Category::where('parent_id', 4)->withTranslations($locale)->get();

        return view('pages.home', compact('posts', 'categories', 'post_categories'));
    }
}
