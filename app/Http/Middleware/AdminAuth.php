<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class AdminAuth
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
        if(Auth::check())
        {
            if(Auth::user()->user_role_code == 'admin' && Auth::user()->status_code == 'active')
            {
                return $next($request);
            }
            else
            {
                return redirect()->back();                
            }
        }
        else
        {
            return redirect()->back();
        }
    }
}
