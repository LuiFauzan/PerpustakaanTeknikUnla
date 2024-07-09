<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaBooksController extends Controller
{
    //
    public function index(){
        $books = Book::latest()->paginate(6);
        
        return view('home',['title'=>'Halaman Beranda'],compact('books'));
    }
}
