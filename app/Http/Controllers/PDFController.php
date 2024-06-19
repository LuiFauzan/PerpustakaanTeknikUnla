<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public function download(Report $report)
    {
        $filePath = storage_path("storage/dokumen/{$report->file_laporan}");

        if (file_exists($filePath)) {
            return response()->download($filePath, $report->file_laporan);
        } else {
            abort(404, 'File not found');
        }
    }
}

