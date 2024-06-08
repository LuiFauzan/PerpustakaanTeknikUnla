<?php

use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserBooksController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserBorrowController;
use App\Http\Controllers\BerandaBooksController;
use App\Http\Controllers\DashboardUsersController;
use App\Http\Controllers\DashboardBorrowController;
use App\Http\Controllers\DashboardPengembalianController;
use PHPUnit\Framework\Attributes\Group;

// Route::get('/', function () {
//     return view('home',['title'=>'Home Page']);
// });
// Route::get('/books', function () {
//     return view('gallery-books',['title'=>'Books Page']);
// });


// Route::get('/',[UserController::class,'index']);

Route::middleware(['isAdmin'])->group(function(){
Route::get('/dashboard',[AdminController::class,'index']);
// Route::get('/dashboard',[SuperAdminController::class,'index']);
Route::get('/dashboard/data-pinjaman', [DashboardBorrowController::class,'index']);
Route::put('/dashboard/data-pinjaman/{id}', [DashboardBorrowController::class,'update']);
Route::get('/dashboard/data-pengguna', [UsersController::class,'index']);
Route::get('/dashboard/konfirmasi-pengembalian',[DashboardPengembalianController::class,'index']);
Route::put('/dashboard/konfirmasi-pengembalian/{id}',[DashboardPengembalianController::class,'update']);
// rourtes kelola buku
Route::get('/dashboard/books', [BooksController::class, 'index'])->name('books.index');
Route::get('/dashboard/books/create', [BooksController::class, 'create'])->name('books.create');
Route::post('/dashboard/books', [BooksController::class, 'store']);
Route::get('/dashboard/books/detail/{id}', [BooksController::class, 'show'])->name('books.show');
Route::get('/books/single-book/{id}', [UserBorrowController::class, 'create']);
Route::get('/dashboard/books/{id}/edit', [BooksController::class, 'edit'])->name('books.edit');
Route::put('/dashboard/books/{id}', [BooksController::class, 'update'])->name('books.update');
Route::delete('/dashboard/books/{id}', [BooksController::class, 'destroy'])->name('books.delete');
// buat laporan
Route::get('/dashboard/buat-laporan',[ReportController::class,'index']);
Route::get('/dashboard/report/create',[ReportController::class,'create']);
Route::get('/dashboard/report/detail/{id}',[ReportController::class,'show']);
Route::post('/dashboard/report/store',[ReportController::class,'store'])->name('report.store');
});

Route::middleware(['checkLogin'])->group(function(){
Route::post('/books', [UserBorrowController::class, 'store']);
Route::delete('/books/single-book/{id}', [UserBorrowController::class, 'destroy']);
Route::put('/books/single-book/{id}', [UserBorrowController::class, 'pengembalian']);
// Users Setting
Route::get('/user/profile/{id}',[UsersController::class,'formprofile']);
Route::put('/user/profile/{id}/password', [UsersController::class, 'changePassword'])->name('changepassword');
Route::put('/user/profile/{id}/photo', [UsersController::class, 'changePhoto'])->name('changephoto');
Route::get('/user/list/{id}',[UsersController::class,'formlist']);
});
// Route::post('/books/single-book/minjem', [UserBorrowController::class, 'store']);

// guest
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/login',[LoginController::class,'authenticate']);
Route::get('/books',[UserBooksController::class,'index']);
Route::get('/',[BerandaBooksController::class,'index']);
// // API
// Route::get('/fetch-books', [BooksController::class, 'fetchBooks']);
Route::middleware(['isSuperAdmin'])->group(function(){
Route::get('dashboard/acc-laporan',[ReportController::class,'index']);
Route::get('/dashboard/report/{id}/edit',[ReportController::class,'edit']);
Route::put('/dashboard/report/{id}',[ReportController::class,'update'])->name('report.update');
});
// require 'api.php';