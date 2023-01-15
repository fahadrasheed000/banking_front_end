<?php

namespace App\Http\Middleware;

use Closure;


use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;


class VerifyToken
{
    public function handle($request, Closure $next)

    {

        if(!session()->has('access_token'))
        {
            return redirect('/');
        }else if(session()->has('access_token') && $request->is('/'))
        {
            return redirect('/home');
        }
        return $next($request);

    }
}
