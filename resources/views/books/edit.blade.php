<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div>
        <div class="border rounded shadow-md p-4">  
          <form action="/dashboard/books/{{ $book->id }}" method="POST" enctype="multipart/form-data">
            <h2 class="text-xl font-semibold mb-4">Form Input Buku</h2>
            @csrf
            @method('PUT')
          <div class="mb-4">
            <label for="judul" class="block mb-2 text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul',$book->judul) }}" class="block w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
          </div>
          <div class="mb-4">
            <label for="isbn" class="block mb-2 text-sm font-medium text-gray-700">ISBN</label>
            <input type="text" name="isbn" id="isbn" value="{{ old('isbn',$book->isbn) }}" class="block w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
          </div>
      
          <div class="mb-4">
            <label for="penulis" class="block mb-2 text-sm font-medium text-gray-700">Penulis</label>
            <input type="text" name="penulis" id="penulis" value="{{ old('penulis',$book->penulis) }}" class="block w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
          </div>
      
          <div class="mb-4">
            <label for="penerbit" class="block mb-2 text-sm font-medium text-gray-700">Penerbit</label>
            <textarea name="penerbit" id="penerbit" cols="30" rows="10" class="block w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500"value="{{ old('penerbit',$book->penerbit) }}" required></textarea>
          </div>
      
          {{-- <div class="mb-4">
            <label for="tag" class="block mb-2 text-sm font-medium text-gray-700">Tag/Kategori</label>
            <input type="text" name="tag" id="tag" class="block w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
          </div> --}}
      
          <div class="mb-4">

            <label for="gambar" class="block mb-2 text-sm font-medium text-gray-700" >Gambar Lama</label>
            <img src="{{ asset('storage/img/books/'.$book->gambar) }}" alt="">
            <label for="gambar" class="block mb-2 text-sm font-medium text-gray-700" >Gambar Baru</label>
            <input type="file" name="gambar" id="gambar" class="block w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
          </div>
      
          <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Submit
          </button>
        </form>
      </div>
      
    </div>
</x-layout-admin>