<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfPaid
{
    public function handle($request, Closure $next)
    {
           if(\Auth::user()->paid == 0){
                return redirect('/subscription-cancelled');
            }
        return $next($request);
    }
}
