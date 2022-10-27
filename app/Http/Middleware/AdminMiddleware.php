<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->role_as == '1')
            {
                return $next($request);
            }
            else
            {
                return redirect('/user/home')->with('status','Access Denied! as you are not as admin');
            }
        }
        else
        {
            return redirect('/user/home')->with('status','Please Login First');
        }
    }
}
