<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $books = Book::where('slug', $slug)->first();
        $category = Category::all();
        return view('books.edit', [
            'category' => $category,
            'books' => $books,
        ]);
    }

    public function update(Request $request, $slug)
    {
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName =  $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }

        $books = Book::where('slug', $slug)->first();
        $books->update($request->all());

        if ($request->categories) {
            $books->categories()->sync($request->categories);
        }

        return redirect()->route('books')->with('status', "Data Berhasil Di Update");
    }

    public function destroy($id)
    {
        DB::table('book_category')->truncate();
        Book::find($id)->forceDelete();

        return redirect()->route('books')->with('status', "Data Berhasil Di Hapus");
    }
}
