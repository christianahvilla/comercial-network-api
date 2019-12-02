<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Merchant
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
        if(Auth::user()->role == 'Merchant')
        {
            return $next($request);
        }
        return response(json_encode(['error' => 'Unauthorised']), 401)
        ->header('Content-Type', 'text/json');
    }
}
