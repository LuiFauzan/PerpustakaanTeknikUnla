<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <h1 class="text-center text-4xl font-bold text-green-700">
        CHANGE <span class="font-medium text-blue-900">PHOTO</span>
    </h1>

    <div class="border mt-10 bg-slate-100 p-4">
        <div class="flex justify-center mb-4">
            <img src="/img/{{ auth()->user()->photo }}" class="w-40" alt="User Photo">
        </div>
        <div class="flex justify-center">
            <form action="/user/photo/{{ auth()->user()->id }}" method="post" enctype="multipart/form-data" class="flex flex-col items-center">
                @csrf
                @method('PUT')
                <input type="file" name="photo" class="mb-4" required>
                <button type="submit" class="bg-green-900 hover:bg-green-600 text-white px-4 py-2 rounded-md">CHANGE</button>
            </form>
        </div>
    </div>
</x-layout>
