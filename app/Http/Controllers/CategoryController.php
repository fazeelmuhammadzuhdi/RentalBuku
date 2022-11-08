<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('category.index', [
            'category' => $category
        ]);
    }

    public function create()
    {
        return view('category.tambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255'
        ], [
            'name.unique' => 'Category Sudah Ada'
        ]);

        $category = Category::create($request->all());


        return redirect()->route('categories')->with('status', "Data dengan $category->name Berhasil Di Simpan");
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('category.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, $slug)
    {
        // dd($request->all());

        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255'
        ], [
            'name.unique' => 'Category Sudah Ada'
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect()->route('categories')->with('status', "Data Berhasil Di Update");
    }

    public function destroy($id)
    {
        Category::find($id)->forceDelete();

        return redirect()->route('categories')->with('status', "Data Berhasil Di Hapus");
    }
}
