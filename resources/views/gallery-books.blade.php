<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h1 class="text-4xl font-bold text-center text-green-700 text">KUMPULAN <span class="font-medium text-blue-900">BUKU-BUKU</span> </h1>

<x-search></x-search>
<div class="grid h-screen grid-rows-3 gap-4 mt-8 md:grid-cols-3">
    @forelse ($books as $book)
        <div class="flex gap-2 p-3 bg-gray-100 rounded-md">
            <div>
                <img src="/img/books/{{ $book->gambar }}" class="w-52" alt="">
                <img src="{{ $book->gambar }}" class="w-52" alt="">
            </div>
            <div>
                <div class="mt-2 font-semibold text-green-700">
                    Tanggal Post: <span>{{ $book->created_at->format('d-m-Y') }}</span>
                </div>
                <div>
                    <h1 class="mt-4 text-2xl font-bold">{{ Str::limit($book->judul, 7) }}</h1>
                </div>
                <div class="font-semibold text-blue-700 mt-7">
                    <i class="fa-solid fa-user-pen"></i> <span>{{ Str::limit($book->penulis, 15) }}</span>
                </div>
                <div class="font-semibold text-blue-700">
                    <i class="fa-solid fa-calendar-days"></i> <span>{{ Str::limit($book->penerbit, 10) }}</span>
                </div>
                <div class="mt-6">
                    <a href="/books/single-book/{{ $book->id }}" class="p-2 text-white bg-green-700 border rounded-md hover:bg-green-600">Booking Sekarang</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-3 px-4 py-2 mx-auto font-bold text-center text-white bg-red-700 border border-red-400 rounded-sm h-fit">
            Buku {{ request()->search }} Belum Tersedia
        </div>
    @endforelse
</div>

{{ $books->links('vendor.pagination.custom') }}
</x-layout>
