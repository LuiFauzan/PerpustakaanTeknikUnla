<x-layout>
    <x-slot:title>Struktur Organisasi</x-slot:title>

    <div class="text-center my-8">
        <h1 class="text-4xl font-bold mb-4">Struktur Organisasi</h1>
        <p class="text-lg text-gray-600">Berikut adalah struktur organisasi kami:</p>
    </div>

    <div class="flex justify-center">
        <div class="tree">
            <ul>
                <li>
                    <div class="member bg-white shadow-lg rounded-lg overflow-hidden text-center p-4">
                        <img src="path_to_image/k1.jpg" alt="Ketua" class="w-24 h-24 object-cover mx-auto rounded-full">
                        <h2 class="text-xl font-bold mt-2">Ketua</h2>
                        <p class="text-gray-600">Ketua</p>
                    </div>
                    <ul>
                        <li>
                            <div class="member bg-white shadow-lg rounded-lg overflow-hidden text-center p-4">
                                <img src="path_to_image/wk1.jpg" alt="Wakil Ketua" class="w-24 h-24 object-cover mx-auto rounded-full">
                                <h2 class="text-xl font-bold mt-2">Wakil Ketua</h2>
                                <p class="text-gray-600">Wakil Ketua</p>
                            </div>
                            <ul>
                                <li>
                                    <div class="member bg-white shadow-lg rounded-lg overflow-hidden text-center p-4">
                                        <img src="path_to_image/a1.jpg" alt="Anggota 1" class="w-24 h-24 object-cover mx-auto rounded-full">
                                        <h2 class="text-xl font-bold mt-2">Anggota 1</h2>
                                        <p class="text-gray-600">Anggota</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="member bg-white shadow-lg rounded-lg overflow-hidden text-center p-4">
                                        <img src="path_to_image/a2.jpg" alt="Anggota 2" class="w-24 h-24 object-cover mx-auto rounded-full">
                                        <h2 class="text-xl font-bold mt-2">Anggota 2</h2>
                                        <p class="text-gray-600">Anggota</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="member bg-white shadow-lg rounded-lg overflow-hidden text-center p-4">
                                        <img src="path_to_image/a3.jpg" alt="Anggota 3" class="w-24 h-24 object-cover mx-auto rounded-full">
                                        <h2 class="text-xl font-bold mt-2">Anggota 3</h2>
                                        <p class="text-gray-600">Anggota</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="member bg-white shadow-lg rounded-lg overflow-hidden text-center p-4">
                                        <img src="path_to_image/a4.jpg" alt="Anggota 4" class="w-24 h-24 object-cover mx-auto rounded-full">
                                        <h2 class="text-xl font-bold mt-2">Anggota 4</h2>
                                        <p class="text-gray-600">Anggota</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="member bg-white shadow-lg rounded-lg overflow-hidden text-center p-4">
                                        <img src="path_to_image/a5.jpg" alt="Anggota 5" class="w-24 h-24 object-cover mx-auto rounded-full">
                                        <h2 class="text-xl font-bold mt-2">Anggota 5</h2>
                                        <p class="text-gray-600">Anggota</p>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <style>
        .tree ul {
            padding-top: 20px; position: relative;
            transition: all 0.5s;
        }

        .tree li {
            float: left; text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 5px 0 5px;
            transition: all 0.5s;
        }

        .tree li::before, .tree li::after {
            content: '';
            position: absolute; top: 0; right: 50%;
            border-top: 2px solid #ccc;
            width: 50%; height: 20px;
        }

        .tree li::after {
            right: auto; left: 50%;
            border-left: 2px solid #ccc;
        }

        .tree li:only-child::after, .tree li:only-child::before {
            display: none;
        }

        .tree li:only-child { padding-top: 0; }

        .tree li:first-child::before, .tree li:last-child::after {
            border: 0 none;
        }

        .tree li:last-child::before {
            border-right: 2px solid #ccc;
            border-radius: 0 5px 0 0;
        }

        .tree li:first-child::after {
            border-radius: 5px 0 0 0;
        }

        .tree ul ul::before {
            content: '';
            position: absolute; top: 0; left: 50%;
            border-left: 2px solid #ccc;
            width: 0; height: 20px;
        }
    </style>

</x-layout>
