<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/img/perpus.png" type="image/x-icon">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://kit.fontawesome.com/46db5e6224.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        .relative:hover #dropdown {
            display: block;
        }
    </style>
</head>
<body >
    <x-navbar></x-navbar>
    {{-- <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-blue-950 rounded-lg shadow-lg p-8 max-w-md w-full text-center z-50 hidden" id="modal-login">
        <!-- Modal Content -->
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
        <div>
            <a href="#" class="text-blue-500 float-right underline">Forgot Password?</a>
        </div>
        <button class="absolute top-0 right-0 mr-4 mt-2 text-white hover:text-gray-300 focus:outline-none" id="modal-login-close"><i class="fa-solid fa-circle-xmark"></i></button>
    </div> --}}
    <main class="mt-28">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            {{-- Content Here --}}
            @error('npm')
            <div x-data='{showError:true}' x-show='showError' class="absolute left-0 right-0 bg-red-800 border w-96 mx-auto text-white rounded-md p-4 shadow-lg font-bold flex text-center items-center justify-between">
                <div>
                    <i class="fa-solid fa-circle-exclamation"></i>
                   <span class="font-semibold"> {{ $message }}</span>
                </div>
                <button type="button" @click="showError = false" class="text-2xl">&times;</button>
            </div>
            @enderror
            @error('password')
            <div x-data='{showError:true}' x-show='showError' class="absolute left-0 right-0 bg-red-800 border w-96 mx-auto text-white rounded-md p-4 shadow-lg font-bold flex text-center items-center justify-between">
                <div>
                    <i class="fa-solid fa-circle-exclamation"></i>
                   <span class="font-semibold"> {{ $message }}</span>
                </div>
                <button type="button" @click="showError = false" class="text-2xl">&times;</button>
            </div>
            @enderror
            @if (session()->has('error'))
            <div x-data='{showError:true}' x-show='showError' class="absolute left-0 right-0 bg-red-800 border w-96 mx-auto text-white rounded-md p-4 shadow-lg font-bold flex text-center items-center justify-between">
                <div>
                    <i class="fa-solid fa-circle-exclamation"></i>
                   <span class="font-semibold"> {{ session('error') }}</span>
                </div>
                <button type="button" @click="showError = false" class="text-2xl">&times;</button>
            </div>
            @endif
            @if (session()->has('success'))
            <div 
                x-data="{ showSuccess: true }" 
                x-show="showSuccess" 
                x-init="setTimeout(() => showSuccess = false, 5000)" 
                class="absolute left-0 right-0 bg-green-800 border w-96 mx-auto text-white rounded-md p-4 shadow-lg font-bold flex text-center items-center justify-between"
            >
                <div>
                    <i class="fa-solid fa-circle-check"></i>
                    <span class="font-semibold">{{ session('success') }}</span>
                </div>
                <button type="button" @click="showSuccess = false" class="text-2xl">&times;</button>
            </div>
        @endif
            {{ $slot }}
        </div>
    </main>
    <x-footer></x-footer>
    <script src="/js/script.js"></script>
    
</body>
</html>