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
    <table class="min-w-full divide-y divide-gray-200 mt-4">
        <thead class="bg-green-800 text-white">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">No</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">NPM</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Judul Buku</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal Minjam</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal Pengembalian</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($pengembalian as $p)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $p->user->npm }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $p->user->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $p->book->judul }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $p->tanggal_peminjaman }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $p->tanggal_pengembalian }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $p->status }}</td>
               
            </tr>
            @empty
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-center bg-red-600 text-white font-bold" colspan="8">Data Belum Ada</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>