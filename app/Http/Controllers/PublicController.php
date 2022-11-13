<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $book = Book::all();
        return view('v_public.book-list', [
            'book' => $book
        ]);
    }
}