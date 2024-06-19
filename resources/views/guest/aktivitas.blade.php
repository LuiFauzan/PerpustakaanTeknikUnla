<x-layout>
    <x-slot:title>Our Activity</x-slot:title>
    <h1 class="text-center text-4xl font-bold text text-green-700">AKTIVITAS DAN <span class="font-medium text-blue-900">BERITA</span> </h1>
    <div class="mt-5 p-2">
        <h2 class="text-center font-bold text-xl">Aktivitas Kita</h2>
        <div class=" grid grid-rows-3  md:grid-cols-3 gap-4">
            @foreach ($activities as $item)
            <div class="border w-96 shadow-md rounded-md p-2">
                <img src="https://plus.unsplash.com/premium_photo-1664299891807-dbf11c7ec35a?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8YWN0aXZpdHklMjBsaWJyYXJ5fGVufDB8fDB8fHww" class="w-full " alt="">
                <h3 class="font-bold text-lg">{{ $item->title }}</h3>
                <span>{{ $item->date }}</span>
                <p>{{ $item->description }}</p>
            </div>
            @endforeach
        </div>
        <h2 class="text-center font-bold text-xl">Berita</h2>
        <div class=" grid grid-rows-3  md:grid-cols-3 gap-4">
            @foreach ($news as $item)
            <div class="border w-96 shadow-md rounded-md p-2">
                <img src="https://plus.unsplash.com/premium_photo-1664299891807-dbf11c7ec35a?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8YWN0aXZpdHklMjBsaWJyYXJ5fGVufDB8fDB8fHww" class="w-full " alt="">
                <h3 class="font-bold text-lg">{{ $item->title }}</h3>
                <span>{{ $item->date }}</span>
                <p>{{ $item->description }}</p>
            </div>
            @endforeach
        </div>
    </div>

</x-layout>