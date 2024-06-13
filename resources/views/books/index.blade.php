<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div>
        <h1 class="text-2xl font-bold text-center mb-8">Data Buku</h1>
        <a href="/dashboard/books/create" class="py-2 px-4 bg-green-600 hover:bg-green-500 text-white rounded-md"><i class="fa-solid fa-plus"></i> Tambah Buku</a>
        <table class="table-fixed border-collapse border border-green-500 w-full text-center mt-6">
           <thead class=" bg-green-800 text-white font-semibold">
            <tr>
                <td >No</td>
                <td>ISBN</td>
                <td>Gambar</td>
                <td>Judul</td>
                <td>Penulis</td>
                <td>Penerbit</td>
                <td colspan="2">Aksi</td>
            </tr>
           </thead>
           <tbody>
            @forelse ( $books as $book)
            <tr class="border border-gray-600">
                <td >{{ $loop->iteration }}</td>
                <td>{{ $book->isbn }}</td>
                <td>
                    {{-- <img src="{{ asset('storage/img/books/'.$book->gambar) }}" class="mx-auto" width="50%" alt=""> --}}
                    <img src="{{ $book->gambar }}" class="mx-auto" width="50%" alt="">
                </td>
                <td>{{ $book->judul }}</td>
                <td>{{ $book->penulis }}</td>
                <td>{{ $book->penerbit }}</td>
                <td colspan="2">
                    <div class="flex justify-center">
                        <a href="/dashboard/books/{{ $book->id }}/edit" class="py-2 px-4  text-black rounded-md"><i class="fa-solid fa-file-pen"></i></a>
                        <a href="/dashboard/books/detail/{{ $book->id }}" class="py-2 px-4 text-black rounded-md"><i class="fa-solid fa-eye"></i></a>
                        <form action="/dashboard/books/{{ $book->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Anda Yakin Mau Menghapus Buku Ini?')" class="py-2 px-4 text-black rounded-md"><i class="fa-solid fa-trash"></i></button>
                        </form>
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
        {{ $books->links('vendor.pagination.custom') }}
    </div>
</x-layout-admin>