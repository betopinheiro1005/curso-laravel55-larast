<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfLoggedIn
{
    public function handle($request, Closure $next)
    {
            if(\Auth::guest()){
                return redirect('/login');
            }
        return $next($request);
    }
}
