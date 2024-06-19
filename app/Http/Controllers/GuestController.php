<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function profile(){

        return view('guest.profile',['title'=>'Our Profile']);
    }
    public function aktivitas(){
        $activities = [
            (object)[
                'title' => 'Baca Buku Bersama',
                'date' => '2024-06-01',
                'description' => 'Kegiatan membaca buku bersama di ruang baca utama.',
                'image' => 'https://source.unsplash.com/600x400/?reading'
            ],
            (object)[
                'title' => 'Lomba Menulis Cerpen',
                'date' => '2024-06-05',
                'description' => 'Lomba menulis cerpen dengan tema kebebasan berpendapat.',
                'image' => 'https://source.unsplash.com/600x400/?writing'
            ],
            (object)[
                'title' => 'Diskusi Buku',
                'date' => '2024-06-10',
                'description' => 'Diskusi buku bulanan bersama penulis terkenal.',
                'image' => 'https://source.unsplash.com/600x400/?discussion'
            ],
            (object)[
                'title' => 'Pelatihan Literasi Digital',
                'date' => '2024-06-15',
                'description' => 'Pelatihan literasi digital untuk semua kalangan.',
                'image' => 'https://source.unsplash.com/600x400/?digital'
            ],
            (object)[
                'title' => 'Pameran Buku Langka',
                'date' => '2024-06-20',
                'description' => 'Pameran buku langka yang diadakan di aula utama perpustakaan.',
                'image' => 'https://source.unsplash.com/600x400/?exhibition'
            ]
        ];

        $news = [
            (object)[
                'title' => 'Perpustakaan Terima Donasi Buku',
                'date' => '2024-06-02',
                'description' => 'Perpustakaan menerima donasi buku dari masyarakat sekitar.',
                'image' => 'https://source.unsplash.com/600x400/?donation'
            ],
            (object)[
                'title' => 'Perpustakaan Tambah Jam Operasional',
                'date' => '2024-06-06',
                'description' => 'Jam operasional perpustakaan diperpanjang hingga pukul 21.00.',
                'image' => 'https://source.unsplash.com/600x400/?library'
            ],
            (object)[
                'title' => 'Program Magang di Perpustakaan',
                'date' => '2024-06-11',
                'description' => 'Program magang terbuka bagi mahasiswa yang ingin belajar tentang pengelolaan perpustakaan.',
                'image' => 'https://source.unsplash.com/600x400/?internship'
            ],
            (object)[
                'title' => 'Perpustakaan Raih Penghargaan Nasional',
                'date' => '2024-06-16',
                'description' => 'Perpustakaan meraih penghargaan sebagai perpustakaan terbaik tingkat nasional.',
                'image' => 'https://source.unsplash.com/600x400/?award'
            ],
            (object)[
                'title' => 'Kerjasama dengan Penerbit Lokal',
                'date' => '2024-06-21',
                'description' => 'Perpustakaan menjalin kerjasama dengan penerbit lokal untuk mendukung literasi.',
                'image' => 'https://source.unsplash.com/600x400/?partnership'
            ]
        ];

        return view('guest.aktivitas',['title'=>'Our Activity'],compact('activities','news'));
    }
}
