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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .ace {
            width: 100%;
        }
    </style>
</head>
<body>
    <x-sidebar-admin></x-sidebar-admin>
    <main class="mt-24 h-screen pl-96">
        <div class="w-full p-6">
            <div class="bg-gray-100 p-4 rounded-lg">
                {{-- Content Here --}}
                {{ $slot }}
            </div>
        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cek apakah ada pesan sukses dari session
            let successMessage = '{{ Session::get('success') }}';
            if (successMessage) {
                Swal.fire({
                    title: 'Sukses!',
                    text: successMessage,
                    icon: 'success',
                    timer: 5000,
                    timerProgressBar: true,
                    allowOutsideClick: true,  // Mengizinkan klik di luar popup
                    allowEscapeKey: true,     // Mengizinkan tombol escape
                    didDestroy: () => {
                        // Pemulihan atau pembersihan tambahan jika diperlukan
                    }
                });
            }

            // Cek apakah ada pesan error dari session
            let errorMessage = '{{ Session::get('error') }}';
            if (errorMessage) {
                Swal.fire({
                    title: 'Oops..',
                    text: errorMessage,
                    icon: 'error',
                    timer: 5000,
                    timerProgressBar: true,
                    allowOutsideClick: true,  // Mengizinkan klik di luar popup
                    allowEscapeKey: true,     // Mengizinkan tombol escape
                    didDestroy: () => {
                        // Pemulihan atau pembersihan tambahan jika diperlukan
                    }
                });
            }
        });
    </script>
</body>
</html>
