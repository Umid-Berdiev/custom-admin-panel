<?php

namespace App\Http\Middleware;

use Closure;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd($request->segment(1));
        app()->setLocale($request->segment(2));
        // dd($locale);
     //    if(session()->has('locale')) {
    	// 	app()->setLocale(session()->get('locale'));
    	// } else {
    	// 	app()->setLocale(config('voyager.multilingual.default'));
    	// }

    	return $next($request);
    }
}
