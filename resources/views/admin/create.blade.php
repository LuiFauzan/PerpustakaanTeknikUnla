<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>

     <!-- Form untuk menambahkan user -->
     <form action="{{ route('user.store') }}" method="post" class="w-full max-w-lg">
        @csrf
        <div class="mb-4">
            <label for="npm" class="block mb-2 font-semibold">NPM</label>
            <input type="text" name="npm" id="npm" class="w-full p-2 rounded-lg border border-gray-300" required>
            @error('npm')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="name" class="block mb-2 font-semibold">Name</label>
            <input type="text" name="name" id="name" class="w-full p-2 rounded-lg border border-gray-300" required>
            @error('name')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="prodi" class="block mb-2 font-semibold">Prodi</label>
            <input type="text" name="prodi" id="prodi" class="w-full p-2 rounded-lg border border-gray-300" required>
            @error('prodi')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" name="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-500">Tambah User</button>
    </form>

</x-layout-admin>