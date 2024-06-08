
<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="bg-white p-8 rounded-lg shadow-lg w-full">
        <h2 class="text-2xl font-bold mb-6 text-center">Upload Laporan</h2>
        <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label for="judul_laporan" class="block text-sm font-medium text-gray-700">Judul Laporan</label>
                <input type="text" name="judul_laporan" id="judul_laporan" class="mt-5 block w-full text-sm text-gray-900 bg-gray-50 p-2 rounded-lg border border-gray-300 cursor-pointer focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div>
                <label for="file_laporan" class="block text-sm font-medium text-gray-700">Select PDF File</label>
                <input type="file" name="file_laporan" id="file_laporan" accept="application/pdf" class="mt-5 block w-full text-sm text-gray-900 bg-gray-50 p-2 rounded-lg border border-gray-300 cursor-pointer focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="flex justify-between items-center">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent mt-5 text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Upload
                </button>
            </div>
        </form>
    </div>
</x-layout-admin>
