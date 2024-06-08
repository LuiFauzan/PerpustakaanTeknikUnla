<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use Illuminate\Http\Request;

class DashboardBorrowController extends Controller
{
    //
    public function index(Request $request){
        $pinjam = Borrowing::latest()->with(['user','book'])->get();  
        return view('data-pinjaman',['title'=>'Data Peminjaman'],compact('pinjam'));
    }
    public function update(Request $request, $id) {
        // Validasi input
        $request->validate([
            'status' => 'required'
        ]);
        // Temukan peminjaman berdasarkan ID
        $borrowing = Borrowing::findOrFail($id);
        // Perbarui status peminjaman
        $borrowing->update([
            'status' => $request->input('status')
        ]);
        return redirect()->back()->with('success', 'Konfirmasi Berhasil');
    }
}
