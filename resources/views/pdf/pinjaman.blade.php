<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Buku</title>
    @vite('resources/css/app.css')

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            display: flex;
            /* border: 1px solid black; */
        }
        .header img {
            width: 200px; /* Sesuaikan dengan ukuran logo Anda */
            height: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="img/logo perpustakaan teknik.png" alt="Logo">
        {{-- <h1 style="">PERPUSTAKAAN TEKNIK UNLA</h1> --}}
        <hr style="">
        <p style="margin: 0;padding:0;">Jl. Karapitan No.116, Cikawao, Kec. Lengkong, Kota Bandung, Jawa Barat 40261        </p>
        {{-- <h1>Data Buku</h1> --}}
        <hr style="">
    </div>
    <h1 style="text-align: center;">Data Peminjaman</h1>
    <table class="table-fixed border-collapse border border-green-500 w-[200%] text-center mt-6">
        <thead class="bg-green-800 text-white font-semibold">
            <tr>
                <th class="py-2 px-4">No</th>
                <th class="py-2 px-4">NPM</th>
                <th class="py-2 px-4">Nama</th>
                <th class="py-2 px-4">Judul Buku</th>
                <th class="py-2 px-4">Tanggal Pinjam</th>
                <th class="py-2 px-4">Tanggal Pengembalian</th>
                <th class="py-2 px-4">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pinjam as $p)
            <tr class="border border-gray-600">
                <td class="py-2 px-4">{{ $loop->iteration }}</td>
                <td class="py-2 px-4">{{ $p->user->npm }}</td>
                <td class="py-2 px-4">{{ $p->user->name }}</td>
                <td class="py-2 px-4">{{ $p->book->judul }}</td>
                <td class="py-2 px-4">{{ $p->tanggal_peminjaman }}</td>
                <td class="py-2 px-4">{{ $p->tanggal_pengembalian }}</td>
                <td class="py-2 px-4">{{ $p->status }}</td>
                
            </tr> 
            @empty
            <tr>
                <td colspan="8" class="text-center bg-red-600 text-white font-bold py-4" colspan="8">Data Belum Ada</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
