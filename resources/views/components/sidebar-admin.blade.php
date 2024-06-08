<nav class="fixed top-0 z-50 w-full border-b bg-green-900 py-2 px-4 flex justify-between items-center">
    <div class="w-auto"><img src="/img/logo.png" width="60%" alt=""></div>
    <div class="w-auto relative" x-data="{isOpen:false}">
        <img src="/img/default.png" class="w-14 md:w-12 cursor-pointer hover:outline outline-offset-1 hover:outline-gray-400 hover:outline-4 rounded-full" alt="" @click="isOpen = !isOpen">
        
        <div
        x-show="isOpen"
        x-transition:enter="transition ease-out duration-100 transform"
        class="origin-top-right absolute right-0 mt-3 w-56 rounded-md shadow-lg"
        >
            <div class="rounded-md bg-gray-100 shadow-lg py-2">
                <div class="text-md p-4">
                    <div>{{ auth()->user()->name }}</div>
                    @if (auth()->user()->is_admin)    
                    <div>Admin</div>
                    @else
                    <div>Super Admin</div>
                    @endif
                </div>
                <hr class="border-b border-gray-300 mt-2">
                <div class="grid grid-rows-3 gap-1">
                    <a href="#" class="hover:bg-gray-200 py-2 px-4 rounded-md">Profile</a>
                    <a href="#" class="hover:bg-gray-200 py-2 px-4 rounded-md">Change Password</a>
                    <a href="#" class="hover:bg-gray-200 py-2 px-4 rounded-md">Change Photo</a>
                    <hr class="border-b border-gray-300">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="text-start hover:bg-gray-200 py-2 px-4 rounded-md w-full" type="submit"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</nav>
<aside class="bg-green-900 fixed top-0 pt-24 w-96 h-screen py-2 px-4">
    <div class="p-4">
        <h2 class="text-3xl font-bold text-white">List Menu</h2>
        <hr class="border-white border-2 my-3">
        <div class="grid grid-rows-6 gap-2">
            <x-sidebar-link href="/dashboard" :active="request()->is('dashboard')"><i class="fa-solid fa-house"></i><span class="ml-2"> Dashboard</span></x-sidebar-link>
            @if (auth()->user()->is_admin)
            <x-sidebar-link href="/dashboard/books" :active="request()->is('dashboard/books*')"><i class="fa-solid fa-book-bookmark"></i><span class="ml-2"> Data Buku</span></x-sidebar-link>
            <x-sidebar-link href="/dashboard/data-pinjaman" :active="request()->is('dashboard/data-pinjaman')"><i class="fa-solid fa-file-export"></i><span class="ml-2"> Data Pinjaman</span></x-sidebar-link>
            <x-sidebar-link href="/dashboard/konfirmasi-pengembalian" :active="request()->is('dashboard/konfirmasi-pengembalian')"><i class="fa-solid fa-file-import"></i><span class="ml-2"> Konfirmasi Pengembalian</span></x-sidebar-link>
            <x-sidebar-link href="/dashboard/data-pengguna" :active="request()->is('dashboard/data-pengguna')"><i class="fa-solid fa-users"></i><span class="ml-2"> Data Pengguna</span></x-sidebar-link>
            <x-sidebar-link href="/dashboard/buat-laporan" :active="request()->is('dashboard/buat-laporan')"><i class="fa-solid fa-pen-to-square"></i><span class="ml-2"> Buat Laporan</span></x-sidebar-link>
            @else
            <x-sidebar-link href="/dashboard/acc-laporan" :active="request()->is('dashboard/acc-laporan')"><i class="fa-solid fa-square-check"></i><span class="ml-2"> Acc Laporan</span></x-sidebar-link>
            @endif
        </div>
    </div>
</aside>