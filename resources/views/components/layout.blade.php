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
    <main class="mt-28">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            {{-- Content Here --}}
            @error('npm')
            <div x-data='{showError:true}' x-show='showError' class="absolute z-50 left-0 right-0 bg-red-800 border w-96 mx-auto text-white rounded-md p-4 shadow-lg font-bold flex text-center items-center justify-between">
                <div>
                    <i class="fa-solid fa-circle-exclamation"></i>
                   <span class="font-semibold"> {{ $message }}</span>
                </div>
                <button type="button" @click="showError = false" class="text-2xl">&times;</button>
            </div>
            @enderror
            @error('password')
            <div x-data='{showError:true}' x-show='showError' class="absolute z-50 left-0 right-0 bg-red-800 border w-96 mx-auto text-white rounded-md p-4 shadow-lg font-bold flex text-center items-center justify-between">
                <div>
                    <i class="fa-solid fa-circle-exclamation"></i>
                   <span class="font-semibold"> {{ $message }}</span>
                </div>
                <button type="button" @click="showError = false" class="text-2xl">&times;</button>
            </div>
            @enderror
            @if (session()->has('error'))
            <div x-data='{showError:true}' x-show='showError' class="absolute z-50 left-0 right-0 bg-red-800 border w-96 mx-auto text-white rounded-md p-4 shadow-lg font-bold flex text-center items-center justify-between">
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
                class="absolute z-50 left-0 right-0 bg-green-800 border w-96 mx-auto text-white rounded-md p-4 shadow-lg font-bold flex text-center items-center justify-between"
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