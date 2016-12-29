<?php

namespace App\Http\Middleware;

use Closure;
    
class Admin
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
        
        // return "handling";
         if(\Auth::check())
        {

            if(\Auth::user()->isAdmin())
            {
            return $next($request);
            }
            else
            if(\Auth::user()->isAuthor())
            {
            return $next($request);
            }
        }

        return redirect(404);
        
    }
}
