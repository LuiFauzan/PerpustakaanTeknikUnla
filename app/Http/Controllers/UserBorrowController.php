<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserBorrowController extends Controller
{
    //
    public function create($id) {
        $user = auth()->user();
        $book = Book::findOrFail($id);
        $borrowing = Borrowing::where('user_id', $user->id)
                              ->where('book_id', $id)
                              ->first();
        return view('single-book', [
            'title' => 'Single Buku',
            'book' => $book,
            'user' => $user,
            'borrowing' => $borrowing
        ]);
    }
    
    public function store(Request $request){
        $request->validate([
            'user_id'=> 'required|exists:users,id',
            'book_id'=> 'required|exists:books,id',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date',
            'status' => 'required',
        ]);
    Borrowing::create($request->all());
    return redirect()->back()->with('success','Booking success silahkan tunggu konfirmasi dari admin! ');
    }
    public function pengembalian($id) {
        // Temukan peminjaman berdasarkan ID
        $borrowing = Borrowing::findOrFail($id);
        // Simpan data ke dalam tabel pengembalian
        Pengembalian::create([
            'user_id' => $borrowing->user_id,
            'book_id' => $borrowing->book_id,
            'status' => 'Akan Dikembalikan',
            'tanggal_peminjaman' => $borrowing->tanggal_peminjaman,
            'tanggal_pengembalian' => $borrowing->tanggal_pengembalian
            // Tambahkan kolom lain yang diperlukan
        ]);
    
        // Hapus data dari tabel borrowings
        $borrowing->delete();
        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Terima kasih meminjam buku di sini silahkan balikan buku ke perpustakaan.');
    }
    public function destroy($id){
        $borrowing = Borrowing::findOrFail($id);
        $borrowing->delete();
        return redirect()->back()->with(['success' => 'Peminjaman Kamu Dibatalkan!']);
    }
    
}
