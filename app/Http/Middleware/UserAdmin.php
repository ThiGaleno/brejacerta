<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAdmin
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
        if(!(auth('api')->user() && auth('api')->user()->admin)){
            return response()->json('Você não tem permissão para isso, meu consagrado(a)', 401);
        }
        return $next($request);
    }
}
