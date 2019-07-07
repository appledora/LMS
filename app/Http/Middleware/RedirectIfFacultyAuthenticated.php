<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class RedirectIfFacultyAuthenticated
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
        if (Auth::guard('web_faculty')->check()) {
            // dd($request);
            return redirect('faculty_home');
        }
        return $next($request);
    }
}
