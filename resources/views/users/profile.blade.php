<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h1 class="text-center text-4xl font-bold text-green-700">YOUR <span class="font-medium text-blue-900">PROFILE</span></h1>
    <div class="mt-10 border bg-slate-100 p-5">
        <div class="flex justify-evenly items-center">
            <div>
                <div class="flex justify-center">
                    <img src="/img/{{ auth()->user()->photo }}" class="w-52" alt="">
                </div>
                <div class="flex justify-center text-center mt-5">
                    <form action="{{ route('changephoto', ['id' => auth()->user()->id]) }}" method="post" enctype="multipart/form-data" class="flex flex-col items-center">
                        @csrf
                        @method('PUT')
                        <input type="file" name="photo" class="mb-4" required>
                        <div class="w-full flex">
                            <button type="submit" class="bg-green-900 w-full hover:bg-green-600 text-white px-4 py-2 rounded-md">CHANGE PHOTO</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ml-28 w-full">
                <div class="mb-4">
                    <label for="nama" class="block font-semibold">Nama</label>
                    <input type="text" id="nama" class="bg-white p-2 rounded-md border w-full" disabled value="{{ auth()->user()->name }}">
                </div>
                <div class="mb-4">
                    <label for="npm" class="block font-semibold">NPM</label>
                    <input type="text" id="npm" class="bg-white p-2 rounded-md border w-full" disabled value="{{ auth()->user()->npm }}">
                </div>
                <div class="mb-4">
                    <label for="prodi" class="block font-semibold">Prodi</label>
                    <input type="text" id="prodi" class="bg-white p-2 rounded-md border w-full" disabled value="{{ auth()->user()->prodi }}">
                </div>
            </div>
        </div>
        <div class=" mt-10 w-96">
            <h1 class="text-2xl font-bold">CHANGE PASSWORD</h1>
            <form action="{{ route('changepassword', ['id' => auth()->user()->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group mb-4 relative w-96">
                    <label for="current_password" class="block font-semibold">Current Password:</label>
                    <input type="password" id="current_password" name="current_password" class="bg-white p-2 rounded-md border w-full" required>
                    <i class="fas fa-eye toggle-password absolute right-4 top-10 cursor-pointer" onclick="togglePassword('current_password')"></i>
                </div>
                <div class="form-group mb-4 relative w-96">
                    <label for="new_password" class="block font-semibold">New Password:</label>
                    <input type="password" id="new_password" name="new_password" class="bg-white p-2 rounded-md border w-full" required>
                    <i class="fas fa-eye toggle-password absolute right-4 top-10 cursor-pointer" onclick="togglePassword('new_password')"></i>
                </div>
                <div class="form-group mb-4 relative w-96">
                    <label for="confirm_new_password" class="block font-semibold">Confirm New Password:</label>
                    <input type="password" id="confirm_new_password" name="new_password_confirmation" class="bg-white p-2 rounded-md border w-full" required>
                    <i class="fas fa-eye toggle-password absolute right-4 top-10 cursor-pointer" onclick="togglePassword('confirm_new_password')"></i>
                </div>
                <button type="submit" class="bg-green-900 hover:bg-green-600 text-white px-4 py-2 rounded-md w-72">CHANGE PASSWORD</button>
            </form>
            
        </div>
    </div>
    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.nextElementSibling;
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</x-layout>
