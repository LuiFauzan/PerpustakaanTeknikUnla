<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h2 class="text-3xl font-bold mb-4 text-white">Login</h2>
        <form method="post" action="/login">
            @csrf
            <div class="mb-4">
                <label for="website-admin" class="block mb-2 text-start text-sm text-white font-semibold">UserID</label>
                <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-white bg-blue-500 border border-e-0 border-gray-300 rounded-s-md ">
                        <i class="fa-solid fa-id-card"></i>
                    </span>
                    <input type="text" id="website-admin" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  " name="npm" placeholder="UserId">
                </div>
            </div>
            <div class="mb-4">
                <label for="website-admin" class="block mb-2 text-start text-sm text-white font-semibold">Password</label>
                <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-white bg-blue-500 border border-e-0 border-gray-300 rounded-s-md ">
                        <i class="fa-solid fa-key"></i>
                    </span>
                    <input type="password" id="website-admin" name="password" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5 " placeholder="Password">
                </div>
            </div>
        
            <button type="submit" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Login</button>
        </form>
</x-layout>