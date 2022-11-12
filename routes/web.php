<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can profile web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('auth');

Route::middleware('only_guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerProcess'])->name('register.process');
});


Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('only_admin')->name('dashboard');
    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client')->name('profile');

    Route::get('books', [BookController::class, 'index'])->name('books');
    Route::get('books-add', [BookController::class, 'create'])->name('books.tambah');
    Route::post('books-add', [BookController::class, 'store'])->name('books.simpan');
    Route::get('books-edit/{slug}', [BookController::class, 'edit'])->name('books.edit');
    Route::put('books-update/{slug}', [BookController::class, 'update'])->name('books.update');
    Route::delete('books-delete/{id}', [BookController::class, 'destroy'])->name('books.delete');


    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('register-users', [UserController::class, 'registerUser'])->name('register.users');
    Route::get('user-details/{slug}', [UserController::class, 'show'])->name('user-details');
    Route::get('approve/{slug}', [UserController::class, 'approve'])->name('user-approve');
    Route::delete('delete/{slug}', [UserController::class, 'destroy'])->name('user-delete');


    Route::get('categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('tambah', [CategoryController::class, 'create'])->name('tambah');
    Route::post('simpan', [CategoryController::class, 'store'])->name('simpan');
    Route::get('edit/{slug}', [CategoryController::class, 'edit'])->name('edit');
    Route::put('update/{slug}', [CategoryController::class, 'update'])->name('update');

    Route::delete('hapus/{id}', [CategoryController::class, 'destroy'])->name('hapus');



    Route::get('rent-logs', [RentLogController::class, 'index'])->name('rent.logs');
});
