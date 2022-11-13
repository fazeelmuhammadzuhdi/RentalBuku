<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RentBookController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', '!=', 1)->get();
        $books = Book::all();
        return view('book-rent.index', [
            'users' => $users,
            'books' => $books
        ]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        $book = Book::findOrFail($request->book_id)->only('status');

        if ($book['status'] != 'in stock') {
            Session::flash('message', 'Cannot Rent, the book is not available');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('rental-buku');
        } else {
            
        }

        dd("bisa pinjam");
    }
}
