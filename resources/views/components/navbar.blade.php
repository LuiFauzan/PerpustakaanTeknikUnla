
<nav class="bg-green-900 px-6 md:px-36 py-3 fixed w-full top-0 z-50 ">
    <div class="flex justify-between items-center">
        <div class="w-auto">
            <a href="/">
                <img src="/img/logo.png" class="w-52 md:w-60" alt="">
            </a>
        </div>
        {{-- Dekstop --}}
        <div class="hidden md:flex space-x-4 items-center justify-between w-[60%]">
            <div class=" ">
                <x-nav-link href="/" :active="request()->is('/*')"><i class="fa-solid fa-house"></i> Beranda</x-nav-link>
                <x-nav-link href="#" :active="request()->is('profile')"><i class="fa-solid fa-sitemap"></i> Profile</x-nav-link>
                <x-nav-link href="/books" :active="request()->is('books*')"><i class="fa-solid fa-book"></i> Galeri Buku</x-nav-link>
                <x-nav-link href="#" :active="request()->is('aktivitas')"><i class="fa-solid fa-newspaper"></i> Aktivitas </x-nav-link>
            </div>
            <div class="w-auto ">
                @auth
                <div class="w-auto relative" x-data="{isOpen:false}">
                    <img src="/img/{{ auth()->user()->photo }}" class="w-14 md:w-12 cursor-pointer hover:outline outline-offset-1 hover:outline-gray-400 hover:outline-4 rounded-full" alt="" @click="isOpen = !isOpen">
                    
                    <div
                    x-show="isOpen"
                    x-transition:enter="transition ease-out duration-100 transform"
                    class="origin-top-right absolute right-0 mt-3 w-56 rounded-md shadow-lg"
                    >
                        <div class="rounded-md bg-gray-100 shadow-lg py-2">
                            <div class="text-md p-4">
                                <div>{{ auth()->user()->name }}</div>
                                <div>{{ auth()->user()->npm }}</div>
                            </div>
                            <hr class="border-b border-gray-300 mt-2">
                            <div class="grid grid-rows-2 gap-1">
                                <a href="/user/profile/{{ auth()->user()->id }}" class="hover:bg-gray-200 py-2 px-4 rounded-md">Profile</a>
                                <a href="/user/list/{{ auth()->user()->id }}" class="hover:bg-gray-200 py-2 px-4 rounded-md">List Buku</a>
                                {{-- <a href="/user/pass/{{ auth()->user()->id }}" class="hover:bg-gray-200 py-2 px-4 rounded-md">Change Password</a> --}}
                                {{-- <a href="/user/photo/{{ auth()->user()->id }}" class="hover:bg-gray-200 py-2 px-4 rounded-md">Change Photo</a> --}}
                                <hr class="border-b border-gray-300">
                                <form action="/logout" method="post">
                                    @csrf
                                    <button class="text-start hover:bg-gray-200 py-2 px-4 rounded-md w-full" type="submit"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
                @else 
                <a href="#" class="px-4 py-2 bg-white text-green-600 border mx-4 text-sm border-white rounded-md hover:bg-slate-200" data-target="#modal-login"><i class="fa-solid fa-right-to-bracket"></i> MASUK</a>
                <!-- Modal Login -->
                <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-950 rounded-lg shadow-lg p-8 max-w-md w-full text-center z-50 hidden" id="modal-login">
                    <!-- Modal Content -->
                    <h2 class="text-3xl font-bold mb-4 text-white">Login</h2>
                    <form method="post" action="/login">
                        @csrf
                        <div class="mb-4">
                            <label for="website-admin" class="block mb-2 text-start text-sm text-white font-semibold">UserID</label>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-white bg-green-500 border border-e-0 border-gray-300 rounded-s-md ">
                                    <i class="fa-solid fa-id-card"></i>
                                </span>
                                <input type="text" required id="website-admin" class="@error('npm') invalid:border-red-600 @enderror rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm p-2.5  " name="npm" placeholder="UserId">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="website-admin" class="block mb-2 text-start text-sm text-white font-semibold">Password</label>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-white bg-green-500 border border-e-0 border-gray-300 rounded-s-md ">
                                    <i class="fa-solid fa-key"></i>
                                </span>
                                <input type="password" required id="website-admin" name="password" class="@error('password') invalid:border-red-600 @enderror rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm p-2.5 " placeholder="Password">
                            </div>
                        </div>
                    
                        <button type="submit" class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Login</button>
                    </form>
                    <div>
                        <a href="#" class="text-green-500 float-right underline">Forgot Password?</a>
                    </div>
                    <button class="absolute top-0 right-0 mr-4 mt-2 text-white hover:text-gray-300 focus:outline-none" id="modal-login-close"><i class="fa-solid fa-circle-xmark"></i></button>
                </div>
                @endauth
                <!-- Modal Background -->
                <div class="fixed top-0 left-0 w-full h-full bg-green-950 bg-opacity-75 z-40 hidden" id="modal-login-bg"></div>
        </div>
        </div>
        {{-- End Dekstop --}}

        {{-- Mobile --}}
        <div class="text-white text-2xl md:hidden" x-data="{isOpen:false}">
            <i :class="isOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'"  @click="isOpen=!isOpen"></i>
            <div x-show="isOpen" x-transition:enter="transition ease-in-out duration-100 transform"
            class="absolute z-50 right-0 p-2 mt-5 w-60 shadow-lg bg-green-900 rounded-md">
            <div class="w-auto relative" x-data="{isOpen:false}">
                @auth
                    <div class="flex items-center">
                        <img src="/img/default.png" class="w-14 cursor-pointer hover:outline outline-offset-1 hover:outline-gray-400 hover:outline-4 rounded-full" alt="" @click="isOpen = !isOpen">   
                        <div class="text-sm ml-4">
                            <div>{{ auth()->user()->name }}</div>
                            <div>{{ auth()->user()->npm }}</div>
                        </div>
                    </div>
                    <div
                    x-show="isOpen"
                    x-transition:enter="transition ease-out duration-100 transform"
                    class="right-0 mt-3 w-full"
                    >
                    <hr class="border-b border-gray-300 mt-2">
                    <div class="grid grid-rows-3 gap-1 text-sm">
                        <a href="#" class="hover:bg-green-700 py-2 px-4 rounded-md">Profile</a>
                        <a href="#" class="hover:bg-green-700 py-2 px-4 rounded-md">Change Password</a>
                        <a href="#" class="hover:bg-green-700 py-2 px-4 rounded-md">Change Photo</a>
                    </div>
                    <hr class="border-b border-gray-300 mb-2">
                    </div>
                    @endauth
                    <div class="grid grid-rows-4 gap-1 mt-4 ">
                        <x-nav-link href="/" :active="request()->is('/*')"><i class="fa-solid fa-house"></i> Beranda</x-nav-link>
            <x-nav-link href="/profile" :active="request()->is('profile')"><i class="fa-solid fa-sitemap"></i> Profile</x-nav-link>
            <x-nav-link href="/books" :active="request()->is('books*')"><i class="fa-solid fa-book"></i> Galeri Buku</x-nav-link>
            <x-nav-link href="/aktivitas" :active="request()->is('aktivitas')"><i class="fa-solid fa-newspaper"></i> Aktivitas </x-nav-link>
                    </div>
                    <div class="text-sm mt-2">
                        @auth
                        <hr class="border-b border-gray-300">
                        <form action="/logout" method="post">
                            @csrf
                            <button class="text-start hover:bg-green-700 py-2 px-4 rounded-md mt-2 w-full" type="submit"><i class="fa-solid fa-right-from-bracket"></i> Keluar</button>
                        </form>
                        @else
                        <hr class="border-b border-gray-300">
                        
                        <button class="cursor-pointer text-start hover:bg-green-700 py-2 w-full px-4 rounded-md mt-2 text-sm" data-target="#modal-login" ><i class="fa-solid fa-right-to-bracket"></i> Masuk</button>
                        <!-- Modal Login -->
                        <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-950 rounded-lg shadow-lg p-8 md:max-w-md md:w-full w-72 text-center z-50 hidden" id="modal-login">
                            <!-- Modal Content -->
                            <h2 class="text-3xl font-bold mb-4 text-white">LOGIN</h2>
                            <form method="post" action="/login">
                                @csrf
                                <div class="mb-4">
                                    <label for="website-admin" class="block mb-2 text-start text-sm text-white font-semibold">UserID</label>
                                    <div class="flex">
                                        <span class="inline-flex items-center px-3 text-sm text-white bg-green-600 border border-e-0 border-gray-300 rounded-s-md ">
                                            <i class="fa-solid fa-id-card"></i>
                                        </span>
                                        <input type="text" required id="website-admin" class="@error('npm') invalid:border-red-600 @enderror rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm p-2.5  " name="npm" placeholder="UserId">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="website-admin" class="block mb-2 text-start text-sm text-white font-semibold">Password</label>
                                    <div class="flex">
                                        <span class="inline-flex items-center px-3 text-sm text-white bg-green-600 border border-e-0 border-gray-300 rounded-s-md ">
                                            <i class="fa-solid fa-key"></i>
                                        </span>
                                        <input type="password" required id="website-admin" name="password" class="@error('password') invalid:border-red-600 @enderror rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm p-2.5 " placeholder="Password">
                                    </div>
                                </div>
                            
                                <button type="submit" class="bg-green-700 hover:bg-green-600 w-full text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">MASUK</button>
                            </form>
                            <div class="mt-2">
                                <a href="#" class="text-green-500 float-right underline">Lupa Kata Sandi?</a>
                            </div>
                            <button class="absolute top-0 right-0 mr-4 mt-2 text-white hover:text-gray-300 focus:outline-none" id="modal-login-close"><i class="fa-solid fa-circle-xmark"></i></button>
                        </div>
                         <!-- Modal Background -->
            <div class="fixed top-0 left-0 w-full h-full bg-green-950 bg-opacity-75 z-40 hidden" id="modal-login-bg"></div>
        </div>
                        @endauth
                    </div>
                </div> 
            </div>
        </div>
        {{--End Mobile  --}}
    </div>
</nav>