<?php

namespace App\Http\Controllers;

use App\Booktest;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BooktestController extends Controller
{
    //Home Function
    public function showForm()
    {
        $categories = Category::all();
        return view('books.addBook', ['categories' => $categories]);
    }

//for general users
    public function showBooklist()
    {
        $books = Booktest::all();
        return view('books.booklist', compact('books'));
    }

//booklist
    public function getBooks()
    {
        $books = Booktest::all();
        return view('books.manageBook', ['books' => $books]);
    }

    //Add new books to the list
    public function addBook(Request $request)
    {
        $this->validate($request, [
            'ISBN_code' => 'required | numeric | unique:books,id',
            'title' => 'required | string',
            'author' => 'required | string',
            'edition' => 'required | numeric',
            'category' => 'required',
            'noOfCopy' => 'required | numeric'
        ]);
        //Getting Data from HTML Form and Inserting to DB
        $book = new Booktest;
        /*        $book->id = $request->input('bookID');*/
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->ISBN_code = $request->input('ISBN_code');
        $book->edition = $request->input('edition');
        $book->category = $request->input('category');
        $book->noOfCopies = $request->input('noOfCopy');
        $book->save();
        return redirect('/addBook')->with('info', 'Book Added Successfully..!');
    }

    //Find a Particular Item using it id
    public function updateBook($id)
    {
        $books = Booktest::find($id);
        $categories = Category::all();
        return view('books.editBook', ['books' => $books], ['categories' => $categories]);
    }

    //Edit & Update
    public function editBook(Request $request, $id)
    {
        $this->validate($request, [
            'ISBN_code' => 'required | numeric',
            'title' => 'required | string',
            'author' => 'required | string',
            'edition' => 'required | numeric',
            'category' => 'required',
            'noOfCopy' => 'required | numeric'
        ]);
        $data = array(
            'ISBN_code' => $request->input('ISBN_code'),
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'edition' => $request->input('edition'),
            'category' => $request->input('category'),
            'noOfCopies' => $request->input('noOfCopy')
        );
        //Update
        Booktest::where('ISBN_code', $id)->update($data);
        return redirect('manageBook')->with('info', 'Book Updated Successfully..!');
    }

    //Delete Function
    public function deleteBook($id)
    {
        Booktest::where('ISBN_code', $id)->delete();
        return redirect('manageBook')->with('info', 'Book Deleted Successfully..!');
    }

    public function searchBooks()
    {
        $input = request()->all();
        if (!isset($input['search'])) return view('books.searchQuery', ["anyData" => false]);

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
        return view('books.searchQuery', ['books' => $books, 'term' => $search, "anyData" => true]);
    }


}

