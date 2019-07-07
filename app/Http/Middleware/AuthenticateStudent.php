<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateStudent
{

    public function handle($request, Closure $next)
    {
        if (!Auth::guard('web_student') -> check()){
            return redirect('/loginas');
        }
        return $next($request);
    }


}
