<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\RentLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            //proses untuk memvalidasi user yang ingin meminjam lebih dari 3 buku
            $count = RentLog::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if ($count >= 3) {
                Session::flash('message', 'Tidak Bisa Pinjam Buku, Karena Kamu Sudah Pinjam 3 Buku');
                Session::flash('alert-class', 'alert-danger');
                return redirect()->route('rental-buku');
            } else {
                try {
                    DB::beginTransaction();
                    //proses insert ke table rent logs
                    RentLog::create($request->all());
                    //proses update status buku di table book
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'not available';
                    $book->save();
                    DB::commit();

                    Session::flash('message', 'Rent Book Success');
                    Session::flash('alert-class', 'alert-success');
                    return redirect()->route('rental-buku');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }
}
