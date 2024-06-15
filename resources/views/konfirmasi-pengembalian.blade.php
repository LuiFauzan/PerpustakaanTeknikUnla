<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold text-center mb-8">Konfirmasi Pengembalian</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-green-800 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">NPM</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Judul Buku</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal Minjam</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal Pengembalian</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Konfirmasi</th>
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
                        <td class="px-6 py-4 whitespace-nowrap">
                            <form id="confirmForm_{{ $p->id }}" action="/dashboard/konfirmasi-pengembalian/{{ $p->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Sudah Dikembalikan">
                                @if ($p->status == 'Sudah Dikembalikan')
                                <button type="button" disabled class="px-4 py-1 bg-green-600 text-white">Disetujui</button>
                                @else
                                <button type="button" onclick="confirmPengembalian('{{ $p->id }}')" class="px-4 py-1 bg-green-800 text-white hover:bg-green-600">Setujui</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-center bg-red-600 text-white font-bold" colspan="8">Data Belum Ada</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmPengembalian(id) {
            Swal.fire({
                title: 'Setujui pengembalian buku ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#14532d',
                cancelButtonColor: '#991b1b',
                confirmButtonText: 'Ya, setujui!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('confirmForm_' + id).submit();
                }
            });
        }
    </script>
</x-layout-admin>
