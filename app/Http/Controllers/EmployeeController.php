<?php

namespace App\Http\Controllers;

use App\AcceptedRequest;
use App\IssueRequest;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = 'employee_home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guard()
    {
        return Auth::guard('web_employee');
    }

    public function showLoginForm()
    {
        return view('employee.login');
    }

    public function getRequest()
    {
        $issueRequests = IssueRequest::all();
        return view('employee.manageRequests', ['issueRequests' => $issueRequests]);

    }

    public function acceptRequest(Request $request)
    {
        $reg = $request->reg_no;
        $isbn = $request->ISBN_code;
        $accept = new AcceptedRequest();
        $accept['reg_no'] = $reg;
        $accept->ISBN_code = $isbn;
        $accept->issue_date = Carbon::now();
        $accept->return_date = Carbon::now()->addDay(30);
        $accept->save();

        DB::table('booktests')->where('ISBN_CODE', $isbn)->decrement('noOfCopies');
        DB::table('issue_requests')->where('ISBN_code', $isbn)->where('reg_no', $reg)->delete();
        return redirect('/manageRequest')->with('info', 'Book request accepted Successfully..!');

    }

    public function returnedBook(Request $request)
    {
        $book = $request->ISBN_code;
        $boy = $request->reg_no;

        DB::table('booktests')->where('ISBN_code', $book)->increment('noOfCopies');
        DB::table('accepted_requests')->where('reg_no', $boy)->where('ISBN_code', $book)->delete();
        return redirect('/trackReturn')->with('info', 'Book returned Successfully..!');


    }

    public function searchBooks(Request $request)
    {
        $input = request()->all();
        if (!isset($input['search'])) return view('searchQuery', ["anyData" => false]);
        $search = $input['search'];
        try {
            $books = DB::table('booktests')->where('ISBN_code', 'like', '%' . $search . '%')
                ->orWhere('title', 'like', '%' . $search . '%')
                ->orWhere('author', 'like', '%' . $search . '%')
                ->orWhere('category', 'like', '%' . $search . '%')
                ->get();
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('booklist')->with('error', 'some error occurred try again');
        }
        return view('employee.livesearch', compact('books'));
    }

    public function getAcceptedHistory()
    {
        $accepted = AcceptedRequest::all();
        return view('employee.manageAccepted', ['accepted' => $accepted]);

    }

}
