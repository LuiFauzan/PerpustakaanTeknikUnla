<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserBooksController extends Controller
{
    //
    public function index(){
        $books = Book::latest();    
        if(request('search')){
            $books->where(function($query) {
                $search = request('search');
                $query->where('judul', 'like', '%' . $search . '%')
                      ->orWhere('isbn', 'like', '%' . $search . '%')
                      ->orWhere('penulis', 'like', '%' . $search . '%')
                      ->orWhere('penerbit', 'like', '%' . $search . '%');
            });
        }
        
        return view('gallery-books', [
            'title' => 'Gallery Buku',
            'books' => $books->paginate(12)
        ]);
    }
    // public function store(Request $request){
    //     $request->validate([
    //         'tanggal_peminjaman' => 'required',
    //         'tanggal_pengembalian' => 'required',
    //         'status' => 'required',
    //     ]);
    // Borrowing::create([
    //     'tanggal_peminjaman' => 'required',
    //         'tanggal_pengembalian' => 'required',
    //         'status' => 'required',
    // ]);
    // return redirect()->route('books.index')->with('minjamSuccess','Booking success👌 silahkan ambil buku di perpustakaan! ');
    // }    
    public function show($id){
        $book = Book::findOrFail($id);
        return view('single-book',['title'=>'Single Buku'],compact('book'));
    }
}
