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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .relative:hover #dropdown {
            display: block;
        }
    </style>
</head>
<body>
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
            {{ $slot }}
        </div>
    </main>
    <x-footer></x-footer>
    <script src="/js/script.js"></script>
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

        // Memastikan event listener hanya dipasang setelah DOM selesai dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Event listener untuk tombol-tombol dengan ID tertentu
            document.getElementById('cancelButton').addEventListener('click', function() {
                Swal.fire({
                    title: 'Anda ingin membatalkan peminjaman?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#14532d',
                    cancelButtonColor: '#991b1b',
                    confirmButtonText: 'Ya, batalkan!',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('cancelForm').submit();
                    }
                });
            });

            document.getElementById('backButton').addEventListener('click', function() {
                Swal.fire({
                    title: 'Anda ingin mengembalikan buku ini?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#14532d',
                    cancelButtonColor: '#991b1b',
                    confirmButtonText: 'Ya, kembalikan!',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('backForm').submit();
                    }
                });
            });

            document.getElementById('borrowButton').addEventListener('click', function() {
                Swal.fire({
                    title: 'Anda ingin meminjam buku ini?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#14532d',
                    cancelButtonColor: '#991b1b',
                    confirmButtonText: 'Ya, pinjam!',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('borrowForm').submit();
                    }
                });
            });
        });
        
    </script>
</body>
</html>
