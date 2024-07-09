<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div>
        <h1 class="text-2xl font-bold text-center mb-8">Data Laporan</h1>
        @if (auth()->user()->is_admin)
        <a href="/dashboard/report/create" class="py-2 px-4 bg-green-600 hover:bg-green-500 text-white rounded-md"><i class="fa-solid fa-plus"></i> Tambah laporan</a>
        @endif
        <div class="overflow-x-auto">
            <table class="table-fixed border-collapse border border-green-500 w-[150%] text-center mt-6">
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
                    @forelse ($report as $book)
                    <tr class="border border-gray-600">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $book->judul_laporan }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $book->file_laporan) }}" download>
                                <button type="button" class="text-blue-700">Unduh Laporan</button>
                            </a>
                        </td>          
                        <td>{{ $book->created_at->format('d-m-Y') }}</td>
                        <td>
                            @if ($book->status == "Disetujui")
                            <span class="text-white p-2 bg-green-700">{{ $book->status }}</span>
                            @elseif($book->status == "Ditolak")
                            <span class="text-white p-2 bg-red-700">{{ $book->status }}</span>
                            @elseif($book->status == "Sedang Ditinjau")
                            <span class="text-white p-2 bg-blue-700">{{ $book->status }}</span>
                            @else
                            <span class="text-white p-2 bg-slate-700">{{ $book->status }}</span>
                            @endif
                        </td>
                        <td>{{ Str::limit($book->comment, 10) }}</td>
                        <td>
                            <div class="flex justify-center">
                                @if (auth()->user()->is_admin)
                                <a href="/dashboard/report/detail/{{ $book->id }}" class="py-2 px-4 text-black rounded-md"><i class="fa-solid fa-eye"></i></a>
                                @else
                                <a href="/dashboard/report/{{ $book->id }}/edit" class="py-2 px-4  text-black rounded-md"><i class="fa-solid fa-file-pen"></i></a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center bg-red-600 text-white font-bold" colspan="7">Data Belum Ada</td>
                    </tr>
                    @endforelse
                </tbody>
                
             </table>
        </div>
       
    </div>
</x-layout-admin>