<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class BooksController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('penerbit', 'LIKE', "%{$search}%")
                  ->orWhere('penulis', 'LIKE', "%{$search}%")
                  ->orWhere('judul', 'LIKE', "%{$search}%");
        }
    
        // Check if export to PDF is requested
        if ($request->get('export') == 'pdf') {
            $books = $query->latest()->get(); // Fetch all books without pagination
            $pdf = Pdf::loadView('pdf.books', ['books' => $books]);
            return $pdf->stream('Data Buku.pdf');
        }
    
        // Otherwise, paginate the results
        $books = $query->latest()->paginate(6);
        return view('books/index', ['title' => 'Halaman Beranda'], compact('books'));
    }
    

    public function create()
    {
        return view('books/create', ['title' => 'Halaman Admin - Tambah Buku']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isbn' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = $request->file('gambar');
        $image->storeAs('public/img/books', $image->hashName());

        Book::create([
            'judul' => $request->judul,
            'isbn' => $request->isbn,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'gambar' => $image->hashName()
        ]);

        return redirect()->route('books.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', ['title' => 'Detail Buku'], compact('book'));
    }

    public function edit(String $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', ['title' => 'Edit Buku'], compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isbn' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $book = Book::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $image->storeAs('public/img/books', $image->hashName());

            Storage::delete('public/img/books/' . $book->gambar);

            $book->update([
                'judul' => $request->judul,
                'isbn' => $request->isbn,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'gambar' => $image->hashName()
            ]);
        }

        return redirect()->route('books.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $borrowings = Borrowing::where('book_id', $id)->where(function($query) {
            $query->where('status', 'Sedang Dipinjam')
                  ->orWhere('status', 'Booking');
        })->count();
    
        if ($borrowings > 0) {
            return redirect()->back()->with(['error' => 'Buku sedang dipinjam dan tidak bisa dihapus']);
        } else {
            $book = Book::find($id);
            
            if ($book) {
                if ($book->image && Storage::exists('public/img/books/'.$book->image)) {
                    Storage::delete('public/img/books/'.$book->image);
                }
                $book->delete();
                return redirect()->route('books.index')->with(['success' => 'Buku Berhasil Dihapus!']);
            } 
        }
    }
}
