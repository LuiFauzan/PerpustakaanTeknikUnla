<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <div class="relative">
        <div x-data="{ slide: 0, totalSlides: 3 }" x-init="startSlideTimer">
            <div class="overflow-hidden" style="height: 500px; display: flex; align-items: center;">
                <!-- Sesuaikan tinggi gambar di sini -->
                <div class="flex transition-transform duration-1000 ease-in-out" :style="'transform: translateX(-' + slide * 100 + '%)'">
                    <div class="w-full flex-shrink-0">
                        <img src="img/image1.jpg" alt="Slide 1" class="w-full h-full">
                        <!-- Gunakan w-full dan h-full untuk memastikan gambar tetap sesuai dengan tinggi container -->
                    </div>
                    <div class="w-full flex-shrink-0">
                        <img src="img/image2.jpg" alt="Slide 2" class="w-full h-full">
                    </div>
                    <div class="w-full flex-shrink-0">
                        <img src="img/image3.jpg" alt="Slide 3" class="w-full h-full">
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-4">
                <template x-for="n in totalSlides">
                    <button @click="slide = n-1" :class="{ 'bg-blue-500': slide === n-1, 'bg-gray-200': slide !== n-1 }" class="w-4 h-4 mx-1 rounded-full focus:outline-none"></button>
                </template>
            </div>
        </div>
    </div>

    <div class="mt-10">
        <h1 class="text-center text-4xl font-bold text-green-700">BUKU <span class="font-medium text-blue-900">TERBARU</span></h1>
        <div class="border mt-4 border-green-700"></div>
        <div class="mt-8 grid gap-4 md:grid-cols-3">
            @forelse ($books as $book)
                <div class="border bg-gray-100 p-3 flex gap-2 rounded-md">
                    <div>
                        <img src="/img/books/{{ $book->gambar }}" class="w-52" alt="">
                        <img src="{{ $book->gambar }}" class="w-52" alt="">
                    </div>
                    <div>
                        <div class="font-semibold text-green-700 mt-2">
                            Tanggal Post: <span>{{ $book->created_at->format('d-m-Y') }}</span>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold mt-4">{{ Str::limit($book->judul, 13) }}</h1>
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
                    Data Buku Belum Ada
                </div>
            @endforelse
        </div>
        <div class="flex justify-center mt-6">
            <a href="/books" class="bg-green-700 text-white rounded-md p-2 px-3 hover:bg-green-600">Baca Lainnya &raquo;</a>
        </div>
    </div>

    <script>
        function startSlideTimer() {
            setInterval(() => {
                this.slide = (this.slide + 1) % this.totalSlides;
            }, 5000);
        }
    </script>
</x-layout>
