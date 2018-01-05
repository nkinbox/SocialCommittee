<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Request;

class PositionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $positionid)
    {   
        if ($request->user() && $request->user()->positionid >= $positionid)
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
