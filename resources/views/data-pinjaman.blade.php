<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="px-6 py-4">
        <h1 class="text-2xl font-bold text-center mb-8">Data Peminjaman</h1>
        <div class="flex gap-2">    
            {{-- <a href="/dashboard/books/create" class="py-2 px-4 bg-green-600 hover:bg-green-500 text-white rounded-md"><i class="fa-solid fa-plus"></i> Tambah Buku</a> --}}
            <a href="{{ route('borrow.index') }}?export=pdf" class="py-2 px-4 bg-green-600 hover:bg-green-500 text-white rounded-md">Cetak Laporan <i class="fa-solid fa-file-pdf"></i></a>
            {{-- <a href="/dashboard/books/create" class="py-2 px-4 bg-green-600 hover:bg-green-500 text-white rounded-md">Download PDF <i class="fa-solid fa-file-arrow-down"></i></a> --}}
            {{-- <button class="py-2 px-4 bg-green-600 hover:bg-green-500 text-white rounded-md">Sort By <i class="fa-solid fa-circle-chevron-down"></i></button> --}}
            <form action="" method="GET">
                <div>
                    <input type="search" name="search" class="py-2 px-4 border rounded-md border-black">
                    <button type="submit" class="py-2 px-4 bg-green-600 hover:bg-green-500 text-white rounded-md">Cari</button>
                </div>
            </form>
        </div>
        <div class="overflow-x-auto">
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
                        <th class="py-2 px-4">Konfirmasi</th>
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
                        <td class="py-2 px-4">
                            <form class="confirmForm" action="/dashboard/data-pinjaman/{{ $p->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Sedang Dipinjam">
                                @if ($p->status == 'Sedang Dipinjam')
                                <button type="button" disabled class="confirmButton px-4 py-1 bg-green-600 text-white">Disetujui</button>   
                                @else
                                <button type="button" class="confirmButton px-4 py-1 bg-green-800 text-white hover:bg-green-600">Setujui</button>   
                                @endif
                            </form>
                        </td>
                    </tr> 
                    @empty
                    <tr>
                        <td colspan="8" class="text-center bg-red-600 text-white font-bold py-4" colspan="8">Data Belum Ada</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const confirmButtons = document.querySelectorAll('.confirmButton');
        confirmButtons.forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('form');
                Swal.fire({
                    title: 'Setujui peminjaman ini?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#14532d',
                    cancelButtonColor: '#991b1b',
                    confirmButtonText: 'Ya, setujui!',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
</x-layout-admin>
