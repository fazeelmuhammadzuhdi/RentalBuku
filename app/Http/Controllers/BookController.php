<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', [
            'books' => $books
        ]);
    }

    public function create()
    {
        $category = Category::all();
        return view('books.tambah', [
            'category' => $category
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255',
        ], [
            'book_code.unique' => 'Category Sudah Ada',
            'title.required' => 'Title Wajib Di Isi',
        ]);

        $newName = '';
        if ($request->file('cover')) {
            $extension = $request->file('cover')->getClientOriginalExtension();
            $newName =  $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('cover')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;

        $books = Book::create($request->all());
        $books->categories()->sync($request->categories);

        return redirect()->route('books')->with('status', "Data Berhasil Di Simpan");
    }

    public function edit($slug)
    {
        //
    }
}
