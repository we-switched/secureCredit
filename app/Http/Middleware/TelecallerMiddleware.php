<?php

namespace App\Http\Middleware;

use Closure;

class TelecallerMiddleware
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
        if ($request->user()->role == 'Telecaller' || $request->user()->role == 'Admin')
            return $next($request);    
        
        return redirect('/')->with('error', 'You are not allowed to access that page');
    }
}
