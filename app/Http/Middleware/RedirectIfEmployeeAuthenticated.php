<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfEmployeeAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { if (Auth::guard()->check()) {
        return redirect('/home');
    }
        if (Auth::guard('web_employee')->check()) {
           // dd($request);
            return redirect('/employee_home');
        }
        return $next($request);
    }
}
