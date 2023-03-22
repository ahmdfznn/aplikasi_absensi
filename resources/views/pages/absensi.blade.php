<x-main>
    <x-slot:title>{{ $title }}</x-slot>
        <x-pages>
            <div class="flex flex-col justify-start w-full">
                @if ($karyawan->count())
                    <h1 class="text-2xl my-2 font-medium">{{ date('Y-m-d') }}</h1>
                    <form action="{{ url('absensi') }}" method="post">
                        @csrf
                        <table class="w-full">
                            <thead>
                                <tr class="border-b-2 border-black text-center">
                                    <th class="p-2">No</th>
                                    <th class="p-2">Nama Karyawan</th>
                                    <th class="p-2">Hadir</th>
                                    <th class="p-2">Sakit</th>
                                    <th class="p-2">Izin</th>
                                    <th class="p-2">Alpha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($karyawan as $data)
                                    <tr class="border-b border-slate-400 text-center font-medium">
                                        <td class="p-2">{{ $loop->iteration }}.</td>
                                        <td class="p-2">
                                            <input type="text" name="nama" id="nama"
                                                value="{{ $data->nama }}"
                                                class="bg-transparent border-none focus:outline-none text-center"
                                                readonly>
                                        </td>
                                        <td class="p-2">
                                            <input type="radio" name="absensi" id="absensi" value="Hadir"
                                                class="scale-2">
                                        </td>
                                        <td class="p-2">
                                            <input type="radio" name="absensi" id="absensi" value="Sakit"
                                                class="scale-2">
                                        </td>
                                        <td class="p-2">
                                            <input type="radio" name="absensi" id="absensi" value="Izin"
                                                class="scale-2">
                                        </td>
                                        <td class="p-2">
                                            <input type="radio" name="absensi" id="absensi" value="Alfa"
                                                class="scale-2">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <x-submit-button class="bg-gray-800 w-32 float-right">{{ __('Kumpulkan') }}</x-submit-button>
                    </form>
                @else
                    <div class="flex flex-col items-center">
                        <h1 class="font-medium text-2xl">Belum ada data absensi</h1>
                        <a href="{{ url('karyawan/create') }}">
                            <x-primary-button class="bg-gray-800">{{ __('+ Tambah Karyawan terlebih dahulu') }}
                            </x-primary-button>
                        </a>
                    </div>
                @endif
            </div>
        </x-pages>
</x-main>
