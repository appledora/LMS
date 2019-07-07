<?php

namespace App\Http\Controllers;

use App\Student;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentRegisterController extends Controller
{
    protected $redirectPath = '/student_login';

    public function showForm()
    {
        return view('student.register');
    }

    public function register(Request $request)
    {
        //Validates data
        $this->validator($request->all())->validate();

        //Create seller
        $student = $this->create($request->all());

        //Authenticates seller
        $this->guard()->login($student);

        //Redirects sellers
        return redirect($this->redirectPath);
    }

    //Validates user's Input
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:student',
            'password' => 'required|min:6|confirmed',
            'reg_no' => 'required|min:10|unique:student',
            'contact' => 'min:10'

        ]);
    }


    //Create a new seller instance after a validation.
    protected function create(array $data)
    {
        $student = Student::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'reg_no' => $data['reg_no'],
            'contact' => $data['contact'],
        ]);
        return $student;
    }

    //Get the guard to authenticate Seller
    protected function guard()
    {
        return Auth::guard('web_student');
    }

}
