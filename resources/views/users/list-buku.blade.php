<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h1 class="text-center text-4xl font-bold text text-green-700">LIST BUKU<span class="font-medium text-blue-900"> YANG DIPINJAM</span> </h1>
    <div class="mt-8 grid grid-rows-3 md:grid-cols-3">
        @forelse ($bukuDipinjam as $book)
        <div class="border bg-gray-100 p-3 flex gap-2 rounded-md mx-2">
            <div>
                {{-- <img src="/img/books/{{ $book->gambar }}" class="w-52" alt=""> --}}
                <img src="{{ $book->book->gambar }}" class="w-52" alt="">
            </div>
            <div class="">
                <div class="font-semibold text-green-700 mt-2">
                    Tanggal Post : <span>{{ $book->book->created_at }}</span>
                </div>
                <div>
                    <h1 class="text-2xl font-bold mt-4">{{ Str::limit($book->book->judul,7) }}</h1>
                </div>
                <div class="font-semibold text-blue-700 mt-7">
                    <i class="fa-solid fa-user-pen"></i> <span>{{ Str::limit($book->book->penulis,15) }}</span>
                </div>
                <div class="font-semibold text-blue-700">
                    <i class="fa-solid fa-calendar-days"></i> <span>{{ Str::limit($book->book->penerbit,20) }}</span>
                </div>
                <div class="mt-6 ">
                    <button disabled class="border p-2 rounded-md text-white bg-green-600">{{ $book->status }}</button>
                </div>
            </div>
        </div>
        @empty
        <div></div>
        <div class="mx-auto px-4 py-2 bg-red-700 rounded-sm font-bold text-white border border-red-400 ">
            Kamu tidak sedang meminjam buku
        </div>
        <div></div>
        @endforelse
    </div>
    <h1 class="text-center text-4xl font-bold text text-green-700">LIST BUKU<span class="font-medium text-blue-900"> YANG DIKEMBALIKAN</span> </h1>
    <div class="mt-8 grid grid-rows-3 md:grid-cols-3">
        @forelse ($bukuDikembalikan as $book)
        <div class="border bg-gray-100 p-3 flex gap-2 rounded-md mx-2">
            <div>
                {{-- <img src="/img/books/{{ $book->gambar }}" class="w-52" alt=""> --}}
                <img src="{{ $book->book->gambar }}" class="w-52" alt="">
            </div>
            <div class="">
                <div class="font-semibold text-green-700 mt-2">
                    Tanggal Post : <span>{{ $book->book->created_at }}</span>
                </div>
                <div>
                    <h1 class="text-2xl font-bold mt-4">{{ Str::limit($book->book->judul,7) }}</h1>
                </div>
                <div class="font-semibold text-blue-700 mt-7">
                    <i class="fa-solid fa-user-pen"></i> <span>{{ Str::limit($book->book->penulis,15) }}</span>
                </div>
                <div class="font-semibold text-blue-700">
                    <i class="fa-solid fa-calendar-days"></i> <span>{{ Str::limit($book->book->penerbit,20) }}</span>
                </div>
                <div class="mt-6 ">
                    <button disabled class="border p-2 rounded-md text-white bg-green-600">{{ $book->status }}</button>
                </div>
            </div>
        </div>
        @empty
        <div></div>
        <div class="mx-auto px-4 py-2 bg-red-700 rounded-sm font-bold text-white border border-red-400 ">
            Kamu Belum Mengembalikan Buku
        </div>
        <div></div>
        @endforelse
    </div>
</x-layout>