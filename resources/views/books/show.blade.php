<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="border bg-gray-100 p-3 flex gap-4 rounded-md">
        <img src="{{ asset('storage/img/books/' . $book->gambar) }}" alt="">
        <img src="{{ $book->gambar }}" alt="">
        <div class="">
            <div class="font-semibold text-green-700 mt-2">
                Tanggal Post : <span>{{ $book->created_at }}</span>
            </div>
            <div>
                <h1 class="text-4xl font-bold mt-4">{{ $book->judul }}</h1>
            </div>
            <div class="font-semibold text-blue-700 mt-7">
                <i class="fa-solid fa-user-pen"></i> <span>{{ $book->penulis }}</span>
            </div>
            <div class="font-semibold text-blue-700">
                <i class="fa-solid fa-barcode"></i> <span>{{ $book->isbn }}</span>
            </div>
            <div class="font-semibold text-blue-700">
                <i class="fa-solid fa-calendar-days"></i> <span>{{ $book->penerbit }}</span>
            </div>
            <div class="mt-4">
                <a href="/dashboard/books" class="border p-2 bg-green-700 rounded-md text-white hover:bg-green-600">Kembali</a>
            </div>
        </div>
    </div>
</x-layout-admin>