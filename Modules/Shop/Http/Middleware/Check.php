<?php

namespace Modules\Shop\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->user_type == 1 || auth()->user()->user_type == 2){
            return $next($request);
        }
        return abort(403);

    }
}
