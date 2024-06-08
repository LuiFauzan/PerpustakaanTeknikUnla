<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div>
        <h1 class="text-2xl font-bold text-center mb-8">DATA PENGGUNA</h1>
        <a href="/dashboard/users/create" class="py-2 px-4 bg-green-500 text-white rounded-md"><i class="fa-solid fa-plus"></i> Tambah Pengguna</a>
        <table class="table-fixed border-collapse border border-green-500 w-full text-center mt-6">
           <thead class=" bg-green-800 text-white font-semibold">
            <tr>
                <td >No</td>
                <td>NPM</td>
                <td>Nama</td>
                <td>Prodi</td>
                <td colspan="2">Aksi</td>
            </tr>
           </thead>
           <tbody>
            @forelse ( $users as $book)
            <tr class="border border-gray-600">
                <td >{{ $loop->iteration }}</td>
                <td>{{ $book->npm }}</td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->prodi }}</td>
                <td colspan="2">
                    <div class="flex justify-center">
                        <a href="/dashboard/users/{{ $book->id }}/edit" class="py-2 px-4  text-black rounded-md"><i class="fa-solid fa-file-pen"></i></a>
                        <form action="/dashboard/users/{{ $book->id }}" method="post">
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
    </div>
</x-layout-admin>