
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h1 class="text-center text-4xl font-bold text text-green-700">Data <span class="font-medium text-blue-900">Buku</span> </h1>

    <div class="mt-8 grid md:grid-cols-2 grid-rows-2 gap-1">
        <div class="border bg-gray-100 p-3 flex gap-4 rounded-s-md">
            <div class="">
                {{-- <img src="/img/books/{{ $book->gambar }}" class="w-80 md:w-80" alt=""> --}}
                <img src="{{ $book->gambar }}" class="w-80 md:w-80" alt="">
            </div>
            <div class="grid grid-rows-3 gap-1">
                <div class="font-semibold text-1xl text-green-700">
                    Tanggal Post : <span>{{ $book->created_at }}</span>
                </div>
                <div>
                    <h1 class="text-2xl font-bold md:text-5xl">{{ Str::limit($book->judul,7) }}</h1>
                </div>
                <div>
                    <div class="font-semibold text-1xl md:text-2xl text-blue-700">
                        <i class="fa-solid fa-barcode"></i> <span>{{ Str::limit($book->isbn,15) }}</span>
                    </div>
                    <div class="font-semibold text-1xl md:text-2xl text-blue-700">
                        <i class="fa-solid fa-user-pen"></i> <span>{{ Str::limit($book->penulis,15) }}</span>
                    </div>
                    <div class="font-semibold text-1xl md:text-2xl text-blue-700 ">
                        <i class="fa-solid fa-calendar-days"></i> <span>{{ Str::limit($book->penerbit,20) }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="border bg-gray-100 p-3 gap-4 rounded-e-md block">
            @if ($borrowing && $borrowing->status == "Booking")
                <div class="p-4">
                    <h1 class="text-center font-bold text-3xl">Tunggu Konfirmasi!</h1>
                    <span class="text-[20px] font-semibold text-red-600">Perhatian:</span>
                    <ul class="list-disc ml-10 text-red-600">
                        <li >Dilarang Merusak Buku</li>
                        <li >Dilarang Menjadi Hak Milik</li>
                        <li >Dilarang Menjual Buku</li>
                        <li >Dilarang Mengembalikan Buku Tenggat Dari Waktu Yang Di Janjikan Dan Jika Telat Maka Akan Di Denda Sebesar Rp.2.500,-/Hari </li>
                    </ul>
                </div>
                <div class="flex justify-center">
                    <form id="cancelForm" action="/books/single-book/{{ $borrowing->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" id="cancelButton" class="px-4 py-2 rounded-md hover:bg-red-700 bg-red-800 text-white font-semibold">Batalkan</button>
                    </form>
                </div>
            @elseif($borrowing && $borrowing->status == "Sedang Dipinjam")
            <div class="p-4">
                <h1 class="text-center font-bold text-3xl">Sudah Disetujui</h1>
                <span class="text-[20px] font-semibold text-red-600">Perhatian:</span>
                <ul class="list-disc ml-10 text-red-600">
                    <li >Dilarang Merusak Buku</li>
                    <li >Dilarang Menjadi Hak Milik</li>
                    <li >Dilarang Menjual Buku</li>
                    <li >Dilarang Mengembalikan Buku Tenggat Dari Waktu Yang Di Janjikan Dan Jika Telat Maka Akan Di Denda Sebesar Rp.2.500,-/Hari </li>
                </ul>
            </div>
            <div class="flex justify-center">
                <form id="cancelForm" class="hidden" action="/books/single-book/{{ $borrowing->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" id="cancelButton" class="px-4 py-2 rounded-md hover:bg-red-700 bg-red-800 text-white font-semibold">Batalkan</button>
                </form>
                <form id="backForm" action="/books/single-book/{{ $borrowing->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="button" id="backButton" class="px-4 py-2 rounded-md hover:bg-green-700 bg-green-800 text-white font-semibold">Kembalikan Buku</button>
                </form>
            </div>
            @else
            <form action="/books" method="post" class="p-4">
                @csrf
               <h1 class="text-center font-bold text-2xl mb-4">ISI FORM PEMINJAMAN</h1>
                <div class="block mb-4">
                    <label for="tanggal-pengambilan" class="block mb-2 font-semibold">Tanggal Pengambilan</label>
                    <input type="date" name="tanggal_peminjaman" class="w-full p-2 rounded-lg border border-black" id="tanggal-pengambilan" required>
                </div>
                <div class="block mb-4">
                    <label for="tanggal-pengembalian" class="block mb-2 font-semibold">Tanggal Pengembalian</label>
                    <input type="date" name="tanggal_pengembalian" class="w-full p-2 rounded-lg border border-black" id="tanggal-pengambilan" required>
                </div>
                <input type="hidden" name="status" id="" value="Booking">
                <input type="hidden" name="user_id" id="" value="{{ $user->id }}">
                <input type="hidden" name="book_id" id="" value="{{ $book->id }}">
                <input type="submit" name="submit" value="BOOKING SEKARANG" class="border p-2 w-full bg-green-700 rounded-md text-white hover:bg-green-600">
           </form>
           @endif
        </div>
    </div>
    <div class="w-full text-center mt-10">
        <a href="/books" class="text-2xl rounded-md border border-black hover:bg-slate-100 px-4 py-2"><i class="fa-solid fa-arrow-left"></i> KEMBALI</a>
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

    </script>
</x-layout>