<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Request;

class AuthLevelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $auth_level)
    {   
        if ($request->user()->auth_level->pluck('authlevel')->search($auth_level) !== false)
        {   
            return $next($request);
        }
        if (Request::wantsJson()) {
            return response()->json(["message"=>"Unauthorised"]);
        } else {
            return new Response(view('unauthorized'));
        }
    }
}
