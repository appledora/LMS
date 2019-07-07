<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class StudentLoginController extends Controller
{
    protected $redirectTo = 'student_home';
    use AuthenticatesUsers;

    protected function guard()
    {
        return Auth::guard('web_student');
    }

    public function showForm()
    {
        return view('student.login');
    }
}
