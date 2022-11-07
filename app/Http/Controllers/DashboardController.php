<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $book = Book::count();
        $category = Category::count();
        $user = User::count();
        return view('auth.dashboard', compact('book', 'category', 'user'));
    }
}
