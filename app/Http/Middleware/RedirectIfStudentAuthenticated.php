<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfStudentAuthenticated
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
        if (Auth::guard()->check()) {
        return redirect('home');
    }
        if (Auth::guard('web_student')->check()) {
            return redirect('student_home');
        }
        return $next($request);
    }
}
