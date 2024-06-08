<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div>
        <h1 class="text-2xl font-bold text-center mb-8">Data Peminjaman</h1>
        <table class="table-fixed border-collapse border border-green-500 w-full text-center mt-6">
           <thead class=" bg-green-800 text-white font-semibold">
            <tr>
                <td >No</td>
                <td>NPM</td>
                <td>Nama</td>
                <td>Judul Buku</td>
                <td>Tanggal Minjam</td>
                <td>Tanggal Pengembalian</td>
                <td>Status</td>
                <td>Konfirmasi</td>
            </tr>
           </thead>
           <tbody>
            @forelse ($pinjam as $p)
            <tr class="border border-gray-600">
                <td >{{ $loop->iteration }}</td>
                <td>{{ $p->user->npm }}</td>
                <td>{{ $p->user->name }}</td>
                <td>{{ $p->book->judul }}</td>
                <td>{{ $p->tanggal_peminjaman }}</td>
                <td>{{ $p->tanggal_pengembalian }}</td>
                <td>{{ $p->status }}</td>
                <td>
                    <form id="confirmForm" action="/dashboard/data-pinjaman/{{ $p->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Sedang Dipinjam">
                        @if ($p && $p->status == 'Sedang Dipinjam')
                            <button type="button" id="confirmButton" disabled class="px-4 py-1 bg-green-600 text-white ">Disetujui</button>   
                        @else
                            <button type="button" id="confirmButton" class="px-4 py-1 bg-green-800 text-white hover:bg-green-600">Setujui</button>   
                        @endif
                        
                    </form>
                </td>
            </tr> 
            @empty
            <td class="text-center bg-red-600 text-white font-bold" colspan="7">
                Data Belum Ada
            </td>
            @endforelse
            
           </tbody>
        </table>
    </div>
    <script>
        document.getElementById('confirmButton').addEventListener('click', function() {
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
                    document.getElementById('confirmForm').submit();
                }
            });
        });
    </script>
</x-layout-admin>