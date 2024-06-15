<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <h1 class="text-center text-4xl font-bold text-green-700">LIST BUKU<span class="font-medium text-blue-900"> YANG DIPINJAM</span></h1>
    <div class="mt-8 grid gap-4 md:grid-cols-3">
        @forelse ($bukuDipinjam as $book)
            <div class="border bg-gray-100 p-3 flex gap-2 rounded-md">
                <div>
                    {{-- <img src="/img/books/{{ $book->gambar }}" class="w-52" alt=""> --}}
                    <img src="{{ $book->book->gambar }}" class="w-52" alt="">
                </div>
                <div>
                    <div class="font-semibold text-green-700 mt-2">
                        Tanggal Post: <span>{{ $book->book->created_at->format('d-m-Y') }}</span>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold mt-4">{{ Str::limit($book->book->judul, 7) }}</h1>
                    </div>
                    <div class="font-semibold text-blue-700 mt-7">
                        <i class="fa-solid fa-user-pen"></i> <span>{{ Str::limit($book->book->penulis, 15) }}</span>
                    </div>
                    <div class="font-semibold text-blue-700">
                        <i class="fa-solid fa-calendar-days"></i> <span>{{ Str::limit($book->book->penerbit, 20) }}</span>
                    </div>
                    <div class="mt-6">
                        @if ($book && $book->status == "Booking")
                            <div class="flex justify-center">
                                <form id="cancelForm" action="/books/single-book/{{ $book->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" id="cancelButton" class="px-4 py-2 rounded-md hover:bg-red-700 bg-red-800 text-white font-semibold">Batalkan</button>
                                </form>
                            </div>
                        @elseif($book && $book->status == "Sedang Dipinjam")
                            <div class="flex justify-center">
                                <form id="backForm" action="/books/single-book/{{ $book->id }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" id="backButton" class="px-4 py-2 rounded-md hover:bg-green-700 bg-green-800 text-white font-semibold">Kembalikan Buku</button>
                                </form>
                            </div>
                        @else
                            <button class="border p-2 rounded-md text-white bg-green-600">{{ $book->status }}</button>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 mx-auto px-4 py-2 bg-red-700 rounded-sm font-bold text-white border border-red-400 text-center">
                Kamu tidak sedang meminjam buku
            </div>
        @endforelse
    </div>
    
    <h1 class="text-center text-4xl font-bold text-green-700 mt-12">LIST BUKU<span class="font-medium text-blue-900"> YANG DIKEMBALIKAN</span></h1>
    <div class="mt-8 grid gap-4 md:grid-cols-3">
        @forelse ($bukuDikembalikan as $book)
            <div class="border bg-gray-100 p-3 flex gap-2 rounded-md">
                <div>
                    {{-- <img src="/img/books/{{ $book->gambar }}" class="w-52" alt=""> --}}
                    <img src="{{ $book->book->gambar }}" class="w-52" alt="">
                </div>
                <div>
                    <div class="font-semibold text-green-700 mt-2">
                        Tanggal Post: <span>{{ $book->book->created_at->format('d-m-Y') }}</span>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold mt-4">{{ Str::limit($book->book->judul, 7) }}</h1>
                    </div>
                    <div class="font-semibold text-blue-700 mt-7">
                        <i class="fa-solid fa-user-pen"></i> <span>{{ Str::limit($book->book->penulis, 15) }}</span>
                    </div>
                    <div class="font-semibold text-blue-700">
                        <i class="fa-solid fa-calendar-days"></i> <span>{{ Str::limit($book->book->penerbit, 20) }}</span>
                    </div>
                    <div class="mt-6">
                        <button disabled class="border p-2 rounded-md text-white bg-green-600">{{ $book->status }}</button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 mx-auto px-4 py-2 bg-red-700 rounded-sm font-bold text-white border border-red-400 text-center">
                Kamu Belum Mengembalikan Buku
            </div>
        @endforelse
    </div>
    <script>
        document.getElementById('cancelButton').addEventListener('click', function() {
    Swal.fire({
        title: 'Anda ingin membatalkan peminjaman?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#14532d',
        cancelButtonColor: '#991b1b',
        confirmButtonText: 'Ya, batalkan!',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('cancelForm').submit();
        }
    });
});

document.getElementById('backButton').addEventListener('click', function() {
    Swal.fire({
        title: 'Anda ingin mengembalikan buku ini?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#14532d',
        cancelButtonColor: '#991b1b',
        confirmButtonText: 'Ya, kembalikan!',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('backForm').submit();
        }
    });
});

document.getElementById('borrowButton').addEventListener('click', function() {
    Swal.fire({
        title: 'Anda ingin mengembalikan buku ini?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#14532d',
        cancelButtonColor: '#991b1b',
        confirmButtonText: 'Ya, kembalikan!',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('borrowForm').submit();
        }
    });
});

    </script>
</x-layout>
