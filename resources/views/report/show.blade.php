<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h1 class="text-center text-2xl font-bold mt-4">DETAIL LAPORAN</h1>
    <div class="border mt-5 p-4 rounded-lg shadow-lg">
        <div class="mb-4">
            <label class="block font-medium text-gray-700">Judul Laporan</label>
            <input type="text" disabled value="{{ $report->judul_laporan }}" class="w-full border border-gray-300 p-2 rounded-lg bg-gray-100">
        </div>
        <div class="mb-4">
            <label class="block font-medium text-gray-700">Tanggal Laporan</label>
            <input type="text" disabled value="{{ $report->tanggal_laporan }}" class="w-full border border-gray-300 p-2 rounded-lg bg-gray-100">
        </div>
        <div class="mb-4">
            <label class="block font-medium text-gray-700">Status</label>
            <input type="text" disabled value="{{ $report->status }}" class="w-full border border-gray-300 p-2 rounded-lg bg-gray-100">
        </div>
        <div class="mb-4">
            <label class="block font-medium text-gray-700">Komentar</label>
            <textarea disabled cols="30" rows="10" class="w-full border border-gray-300 p-2 rounded-lg bg-gray-100">{{ $report->comment }}</textarea>
        </div>
    </div>
</x-layout-admin>
