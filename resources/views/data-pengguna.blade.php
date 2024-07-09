<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div>
        <h1 class="text-2xl font-bold text-center mb-8">DATA PENGGUNA</h1>
        <div class="flex gap-2">    
            <a href="/dashboard/users/create" class="py-2 px-4 bg-green-500 text-white rounded-md"><i class="fa-solid fa-plus"></i> Tambah Pengguna</a>
            {{-- <a href="/dashboard/books/create" class="py-2 px-4 bg-green-600 hover:bg-green-500 text-white rounded-md"><i class="fa-solid fa-plus"></i> Tambah Buku</a> --}}
            <a href="{{ route('user.index') }}?export=pdf" class="py-2 px-4 bg-green-600 hover:bg-green-500 text-white rounded-md">View PDF <i class="fa-solid fa-file-pdf"></i></a>
            {{-- <a href="/dashboard/books/create" class="py-2 px-4 bg-green-600 hover:bg-green-500 text-white rounded-md">Download PDF <i class="fa-solid fa-file-arrow-down"></i></a> --}}
            {{-- <button class="py-2 px-4 bg-green-600 hover:bg-green-500 text-white rounded-md">Sort By <i class="fa-solid fa-circle-chevron-down"></i></button> --}}
            <form action="" method="GET">
                <div>
                    <input type="search" name="search" class="py-2 px-4 border rounded-md border-black">
                    <button type="submit" class="py-2 px-4 bg-green-600 hover:bg-green-500 text-white rounded-md">Cari</button>
                </div>
            </form>
        </div>
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
                        <form action="/dashboard/data-pengguna/{{ $book->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="deleteButton py-2 px-4 text-black rounded-md"><i class="fa-solid fa-trash"></i></button>
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
        {{ $users->links('vendor.pagination.custom') }}
    </div>
    <script>
       document.addEventListener('DOMContentLoaded', function () {
                const confirmButtons = document.querySelectorAll('.deleteButton');
                confirmButtons.forEach(button => {
                    button.addEventListener('click', function (event) {
                        event.preventDefault();
                        const form = this.closest('form');
                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "Data ini akan dihapus dan tidak bisa dikembalikan!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, hapus!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });
       });
    </script>
</x-layout-admin>