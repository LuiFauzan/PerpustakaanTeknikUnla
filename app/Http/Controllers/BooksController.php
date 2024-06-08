<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use PhpParser\Node\Expr\Cast\String_;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;


class BooksController extends Controller
{
    //
    public function index(){
        $books = Book::latest()->paginate(10);
        return view('books/index',['title' => 'Gallery Books'], compact('books'));
    }
    public function create(){
        return view('books/create',['title' => 'Halaman Admin - Tambah Buku']);
    }
    public function store(Request $request){
        $request->validate([
            'judul' => 'required',
            'isbn' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $image = $request->file('gambar');
        $image->storeAs('public/img/books',$image->hashName());
        Book::create([
            'judul'=>$request->judul,
            'isbn'=>$request->isbn,
            'penulis'=>$request->penulis,
            'penerbit'=>$request->penerbit,
            'gambar'=>$image->hashName()
        ]);
        return redirect()->route('books.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function show($id){
        $book = Book::findOrFail($id);
        return view('books.show',['title'=>'Detail Buku'],compact('book'));
    }
    public function edit(String $id){
        $book = Book::findOrFail($id);
        return view('books.edit',['title'=>'Edit Buku'],compact('book'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'judul' => 'required',
            'isbn' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $book = Book::findOrFail($id);
        if($request->hasfile('gambar')){
            $image = $request->file('gambar');
            $image->storeAs('public/img/books',$image->hashName());
            Storage::delete('public/img/books'.$book->image);

            $book->update([
                'judul'=>$request->judul,
                'isbn'=>$request->isbn,
                'penulis'=>$request->penulis,
                'penerbit'=>$request->penerbit,
                'gambar'=>$image->hashName()
            ]);
        }
        return redirect()->route('books.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id){
        $book = Book::findOrFail($id);
        Storage::delete('public/img/books'.$book->image);
        $book->delete();
        return redirect()->route('books.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
