<?php

namespace App\Http\Controllers;

use App\AcceptedRequest;
use Illuminate\Http\Request;

use App\IssueRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{


    public function requestBook($id)
    {
        $req = new IssueRequest();
        if(Auth::guard( 'web_student'))
        {$user = Auth::guard('web_student')->user();}
        elseif (Auth::guard('web_faculty')){
            $user = Auth::guard('web_faculty')->user();
        }
        $reg = $user->reg_no;
        $bookreq = DB::table('booktests')->where('ISBN_code', '=', $id)->get()->first();
        $bname = $bookreq->title;
        $req->reg_no = $reg;
        $req->ISBN_code = $id;
        $req->book_title = $bname;
        $req->save();

        return redirect('booklist')->with('info', 'Book Requested Successfully..!');
    }

    public function borrowHistory()
    {
        if (Auth::guard('web_student')) {
            $user = Auth::guard('web_student')->user();
        }
        $reg = $user->reg_no;
        $borrows = AcceptedRequest::all()->where('reg_no', $reg);
        return view('student.borrowHistory', ['borrows' => $borrows]);
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
        return view('books.booksearch', compact('books'));
    }
}
