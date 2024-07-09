<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    //
    public function index(){
        $report = Report::all();
        return view('report.index',['title'=>'Data Laporan'],compact('report'));
    }
    public function create(){
        return view('report.create',['title'=>'Buat laporan']);
    }
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'judul_laporan' => 'required',
            'file_laporan' => 'required|mimes:pdf', // Restrict to PDF files only, max size 2MB
        ]);
        // Handle the file upload
        if ($request->hasFile('file_laporan')) {
            $file = $request->file('file_laporan');
            $filename = time() . '_' . $file->getClientOriginalName();
    
            // Store the file in the 'uploads' directory
            $path = $file->storeAs('dokumen', $filename, 'public');
    
            // Save the file information to the database
            $report = new Report;
            $report->judul_laporan = $request->judul_laporan;
            $report->file_laporan = $path;
            $report->tanggal_laporan = now();
            $report->status = 'Belum Di Setujui'; // Default value
            $report->comment = 'Tidak Ada Komentar'; // Default value
            $report->save();
    
            // Return success message
            return redirect()->back()->with('success', 'Laporan telah diberikan');
        }
    
        return redirect()->back()->with('error', 'File upload failed.');
    }
    public function edit($id){
        $report = Report::findOrFail($id);
        return view('report.edit', [
            'title' => 'Edit Laporan',
            'report' => $report
        ]);
    }    
    public function update(Request $request, $id) {
        // Validasi input
        $validatedData = $request->validate([
            'status' => 'required|string|max:255',
            'comment' => 'nullable|string',
        ]);

        // Temukan laporan berdasarkan ID
        $report = Report::findOrFail($id);

        // Perbarui data laporan
        $report->status = $validatedData['status'];
        $report->comment = $validatedData['comment'];
        $report->save();

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->back()->with('success', 'Laporan berhasil diperbarui');
    }
    public function show($id){
        $report = Report::findOrFail($id);
        return view('report.show', [
            'title' => 'Detail Laporan',
            'report' => $report
        ]);
    }    
    public function downloadPdf($filename)
    {
        // Lokasi file PDF, misalnya di dalam direktori storage/app/public/
        $filePath = storage_path('app/public/' . $filename);
    
        // Periksa apakah file ada
        if (!Storage::exists($filePath)) {
            abort(404, 'File not found');
        }
    
        // Mengirim file sebagai respons HTTP dengan nama file asli
        return response()->download($filePath, $filename, ['Content-Type' => 'application/pdf']);
    }
    
}
