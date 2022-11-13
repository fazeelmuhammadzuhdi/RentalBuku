<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        // dd($request->all());
        if ($request->category || $request->title) {
            $book = Book::where('title', 'like', '%' . $request->title . '%')->orWhereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->category);
            })->get();
        } else {
            $book = Book::all();
        }

        $book = Book::all();
        return view('v_public.book-list', [
            'book' => $book,
            'categories' => $categories
        ]);
    }
}
