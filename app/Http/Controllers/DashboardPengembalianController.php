<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class DashboardPengembalianController extends Controller
{
    //
    public function index(Request $request){
        $pengembalian = Pengembalian::latest()->with(['user','book'])->get();  
        if($request->get('export') == 'pdf'){
            $pdf = Pdf::loadView('pdf.kembali', ['pengembalian'=>$pengembalian]);
            return $pdf->stream('Data Pengembalian.pdf'); 
        }
        return view('konfirmasi-pengembalian',['title'=>'Data Peminjaman'],compact('pengembalian'));
    }
    public function update(Request $request, $id) {
        // Validasi input
        $request->validate([
            'status' => 'required'
        ]);
        // Temukan peminjaman berdasarkan ID
        $pengembalian = Pengembalian::findOrFail($id);
        // Perbarui status peminjaman
        $pengembalian->update([
            'status' => $request->input('status')
        ]);
        return redirect()->back()->with('success', 'Konfirmasi Berhasil');
    }
}
