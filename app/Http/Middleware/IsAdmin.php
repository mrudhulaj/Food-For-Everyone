<?php

namespace App\Http\Middleware;
use App\User;
use Auth;
use Closure;

class IsAdmin
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
        if(Auth::check()){
          if(Auth::user()->TypeOfAccount != "Admin"){
            return redirect('adminAccessError');
          }
        }
        return $next($request);
    }
}
