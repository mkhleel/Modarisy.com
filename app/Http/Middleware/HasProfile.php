<?php

namespace App\Http\Middleware;

use Closure;

class HasProfile
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
        if(!\Auth::user()->profile) {
            if (\Auth::user()->type == 0)
                return \Redirect::to('/choosetype');
            else
                return \Redirect::to('/profile/create');
        }

        return $next($request);

    }
}
