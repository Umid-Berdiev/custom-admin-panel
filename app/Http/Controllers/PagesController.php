<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $page = Page::where('slug', '/')->where('status', 'ACTIVE')->firstOrFail();

        // return view('pages.page_template', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  vendor\tcg\voyager\src\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  vendor\tcg\voyager\src\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  vendor\tcg\voyager\src\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vendor\tcg\voyager\src\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
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
}
