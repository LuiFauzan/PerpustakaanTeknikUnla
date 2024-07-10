<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CobaApiController extends Controller
{
    public function index(Request $request)
    {
        // Buat instance Guzzle client
        $client = new Client();
        // Kirim permintaan GET ke API Google Books tanpa parameter pencarian
        $response = $client->request('GET', 'https://www.googleapis.com/books/v1/volumes?q=pikiran+filter=partials&key=AIzaSyDrKtgmNYlTmZNQ3mpp86l9xS651XqBxuQ');
        // Ambil isi respons
        $data = json_decode($response->getBody(), true);
        foreach($data['items'] as $item){
            $book = new Book();
            $book->judul = $item['volumeInfo']['title'];
        
        // Mengambil ISBN-13 jika tersedia, jika tidak, gunakan ISBN-10
        $isbn = '';
        if (isset($item['volumeInfo']['industryIdentifiers'])) {
            foreach ($item['volumeInfo']['industryIdentifiers'] as $identifier) {
                if ($identifier['type'] === 'ISBN_13') {
                    $isbn = $identifier['identifier'];
                    break;
                } elseif ($identifier['type'] === 'ISBN_10') {
                    $isbn = $identifier['identifier'];
                }
            }
        }
        
        // Jika tidak ada ISBN yang ditemukan, berikan angka random
        if (empty($isbn)) {
            $isbn = rand(1000000000000, 9999999999999);
        }
        $book->isbn = $isbn;
        
        if (isset($item['volumeInfo']['authors'])) {
            $book->penulis = implode(', ', $item['volumeInfo']['authors']);
        } else {
            $book->penulis = 'Unknown';
        }
        $book->penerbit = isset($item['volumeInfo']['publisher']) ? $item['volumeInfo']['publisher'] : 'Unknown';
        $book->gambar = $item['volumeInfo']['imageLinks']['thumbnail'] ?? ''; // Jika tidak ada gambar, gunakan string kosong
        
        $book->save();

        }
        // Kembalikan data dalam bentuk JSON
        return response()->json(['message','Data Berhasil Ditambahkan']);
    }                   


    public function store(Request $request)
    {
        // Logika untuk menyimpan resource baru
        return response()->json(['message' => 'Store method called']);
    }

    public function show($id)
    {
        // Logika untuk menampilkan resource berdasarkan ID
        return response()->json(['message' => 'Show method called']);
    }

    public function update(Request $request, $id)
    {
        // Logika untuk mengupdate resource berdasarkan ID
        return response()->json(['message' => 'Update method called']);
    }

    public function destroy($id)
    {
        // Logika untuk menghapus resource berdasarkan ID
        return response()->json(['message' => 'Destroy method called']);
    }
}
