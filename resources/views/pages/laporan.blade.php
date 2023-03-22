<x-main>
    <x-slot:title>{{ $title }}</x-slot>
        <x-pages>
            <div class="grid grid-cols-4 gap-3 w-full">
                <div class="flex flex-col bg-gray-700 text-gray-200 text-2xl font-medium p-3 rounded-lg">
                    <h1>Total Karyawan</h1><br>
                    <h1>{{ $karyawan->count() }}</h1>
                </div>
                <div class="flex flex-col bg-gray-700 text-gray-200 text-2xl font-medium p-3 rounded-lg">
                    <h1>Total Karyawan yang hadir</h1><br>
                    <h1>{{ $karyawan->count() }}</h1>
                </div>
                <div class="flex flex-col bg-gray-700 text-gray-200 text-2xl font-medium p-3 rounded-lg">
                    <h1>Total Karyawan yang sakit</h1><br>
                    <h1>{{ $karyawan->count() }}</h1>
                </div>
                <div class="flex flex-col bg-gray-700 text-gray-200 text-2xl font-medium p-3 rounded-lg">
                    <h1>Total Karyawan yang izin</h1><br>
                    <h1>{{ $karyawan->count() }}</h1>
                </div>
                <div class="flex flex-col bg-gray-700 text-gray-200 text-2xl font-medium p-3 rounded-lg">
                    <h1>Total Karyawan yang tidak ada keterangan</h1><br>
                    <h1>{{ $karyawan->count() }}</h1>
                </div>
            </div>
        </x-pages>
</x-main>
