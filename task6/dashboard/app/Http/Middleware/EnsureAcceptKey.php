<?php

namespace App\Http\Middleware;

use Closure;
use App\traits\ApiTraits;
use Illuminate\Http\Request;

class EnsureAcceptKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {    if($request->header('accept')!=='application/json')
        {
            return ApiTraits::errorMessage(['accept'=>'Missed key'] ,"accept:App/json");

    }
        return $next($request);
    }
}
