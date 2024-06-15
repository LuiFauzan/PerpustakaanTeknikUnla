<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h1 class="text-center text-4xl font-bold text text-green-700">KUMPULAN <span class="font-medium text-blue-900">BUKU-BUKU</span> </h1>
    
<x-search></x-search>
<div class="mt-8 grid grid-rows-3 md:grid-cols-3 gap-4">
    @forelse ($books as $book)
        <div class="border bg-gray-100 p-3 flex gap-2 rounded-md">
            <div>
                {{-- <img src="/img/books/{{ $book->gambar }}" class="w-52" alt=""> --}}
                <img src="{{ $book->gambar }}" class="w-52" alt="">
            </div>
            <div>
                <div class="font-semibold text-green-700 mt-2">
                    Tanggal Post: <span>{{ $book->created_at->format('d-m-Y') }}</span>
                </div>
                <div>
                    <h1 class="text-2xl font-bold mt-4">{{ Str::limit($book->judul, 7) }}</h1>
                </div>
                <div class="font-semibold text-blue-700 mt-7">
                    <i class="fa-solid fa-user-pen"></i> <span>{{ Str::limit($book->penulis, 15) }}</span>
                </div>
                <div class="font-semibold text-blue-700">
                    <i class="fa-solid fa-calendar-days"></i> <span>{{ Str::limit($book->penerbit, 10) }}</span>
                </div>
                <div class="mt-6">
                    <a href="/books/single-book/{{ $book->id }}" class="border p-2 bg-green-700 rounded-md text-white hover:bg-green-600">Booking Sekarang</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-3 mx-auto px-4 py-2 bg-red-700 rounded-sm font-bold text-white border border-red-400 text-center">
            Buku {{ request()->search }} Belum Tersedia
        </div>
    @endforelse
</div>

{{ $books->links('vendor.pagination.custom') }}
</x-layout>