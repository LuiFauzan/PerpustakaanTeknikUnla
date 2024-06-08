<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div>
        <h1 class="text-2xl font-bold text-center mb-8">Data Laporan</h1>
        @if (auth()->user()->is_admin)
        <a href="/dashboard/report/create" class="py-2 px-4 bg-green-600 hover:bg-green-500 text-white rounded-md"><i class="fa-solid fa-plus"></i> Tambah laporan</a>
        @endif
        <table class="table-fixed border-collapse border border-green-500 w-full text-center mt-6">
           <thead class=" bg-green-800 text-white font-semibold">
            <tr>
                <td >No</td>
                <td>Judul Laporan</td>
                <td>File</td>
                <td>Tanggal Laporan</td>
                <td>Status</td>
                <td>Komentar</td>
                <td>Aksi</td>
            </tr>
           </thead>
           <tbody>
            @forelse ( $report as $book)
            <tr class="border border-gray-600">
                <td >{{ $loop->iteration }}</td>
                <td>{{ $book->judul_laporan }}</td>
                <td>
                    <a href="dokumen/{{ $book->file_laporan }}" download>
                        <button type="button">Unduh</button>
                    </a>
                </td>                
                <td>{{ $book->tanggal_laporan }}</td>
                <td>{{ $book->status }}</td>
                <td>{{ $book->comment }}</td>
                <td>
                    <div class="flex justify-center">
                        @if (auth()->user()->is_admin)
                        <a href="/dashboard/report/detail/{{ $book->id }}" class="py-2 px-4 text-black rounded-md"><i class="fa-solid fa-eye"></i></a>
                        @else
                        <a href="/dashboard/report/{{ $book->id }}/edit" class="py-2 px-4  text-black rounded-md"><i class="fa-solid fa-file-pen"></i></a>
                        @endif
                    </div>
                </td>
                @empty
                <td class="text-center bg-red-600 text-white font-bold" colspan="8">
                    Data Belum Ada
                </td>
            </tr>
            @endforelse
           </tbody>
        </table>
    </div>
</x-layout-admin>