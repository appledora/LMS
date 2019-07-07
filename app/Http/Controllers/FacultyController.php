<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class FacultyController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = 'faculty_home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guard()
    {
        return Auth::guard('web_faculty');
    }

    public function showLoginForm()
    {
        return view('faculty.login');
    }

}
