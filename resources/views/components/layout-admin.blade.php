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
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        .ace{
            width: 100%;
        }
      
    </style> 
</head>
<body >
    <x-sidebar-admin></x-sidebar-admin>
    
    <main class="mt-24 h-screen pl-96">
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
        <div class=" float-end w-full p-6">
            <div class="bg-gray-100 p-4 rounded-lg">
                {{-- Content Here --}}
                {{ $slot }}
            </div>
        </div>
    </main>
    <script src="js/script.js">
    </script>
</body>
</html>