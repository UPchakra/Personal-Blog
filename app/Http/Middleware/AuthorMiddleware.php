<?php

namespace App\Http\Middleware;

use Closure;

class AuthorMiddleware
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

        if(Auth::check()&& Auth::user()->role_id==2){

        return $next($request);


        }else{
            return redirect()->route('adminlogin')->with('flash_message','Invalid Login Access');
        }
    }
}
