<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class DashboardBorrowController extends Controller
{
    //
    public function index(Request $request){
        $pinjam = Borrowing::latest()->with(['user','book'])->get();  
        if($request->get('export') =='pdf'){
            $pdf = Pdf::loadView('pdf.pinjaman', ['pinjam'=>$pinjam]);
            return $pdf->stream('Data Peminjaman.pdf');
        }
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
