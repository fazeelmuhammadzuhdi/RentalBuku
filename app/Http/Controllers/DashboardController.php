<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\RentLog;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $book = Book::count();
        $category = Category::count();
        $user = User::count();
        $rentLogs = RentLog::with(['user', 'book'])->get();
        return view('auth.dashboard', [
            'book' => $book,
            'category' => $category,
            'user' => $user,
            'rent_logs' => $rentLogs
        ]);
    }
}
