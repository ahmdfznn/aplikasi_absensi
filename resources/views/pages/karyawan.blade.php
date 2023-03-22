<x-main>
    <x-slot:title>{{ $title }}</x-slot>
        <x-pages>
            @if (session()->has('add_pegawai'))
                <x-alert class="bg-green-400">
                    {{ session()->get('add_pegawai') }}
                </x-alert>
            @endif
            @if (session()->has('delete_pegawai'))
                <x-alert class="bg-green-400">
                    {{ session()->get('delete_pegawai') }}
                </x-alert>
            @endif
            @if ($karyawan->count())
                <div class="flex flex-col w-full">
                    <div>
                        <a href="{{ url('karyawan/create') }}">
                            <x-primary-button class="bg-gray-800">{{ __('+ Tambah Karyawan') }}</x-primary-button>
                        </a>
                    </div>
                    <table class="w-full">
                        <thead>
                            <tr class="border-b-2 border-black">
                                <th class="p-2">No</th>
                                <th class="p-2">NIP</th>
                                <th class="p-2">Nama</th>
                                <th class="p-2">NIK</th>
                                <th class="p-2">Jabatan</th>
                                <th class="p-2">Jenis Kelamin</th>
                                <th class="p-2">Tempat Lahir</th>
                                <th class="p-2">Tanggal Lahir</th>
                                <th class="p-2">Nomor Telepon</th>
                                <th class="p-2">Alamat</th>
                                <th class="p-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($karyawan as $data)
                                <tr class="border-b border-slate-400 text-center odd:bg-slate-200">
                                    <td class="p-2">{{ $loop->iteration }}.</td>
                                    <td class="p-2">{{ $data->nip }}</td>
                                    <td class="p-2">{{ $data->nama }}</td>
                                    <td class="p-2">{{ $data->nik }}</td>
                                    <td class="p-2">{{ $data->jabatan }}</td>
                                    <td class="p-2">{{ $data->jenis_kelamin }}</td>
                                    <td class="p-2">{{ $data->tempat_lahir }}</td>
                                    <td class="p-2">{{ $data->tanggal_lahir }}</td>
                                    <td class="p-2">{{ $data->no_telepon }}</td>
                                    <td class="p-2">{{ $data->alamat }}</td>
                                    <td class="p-2">
                                        <a href="{{ url('karyawan/' . $data->nama . '/edit') }}">
                                            <x-primary-button class="bg-gray-800">{{ __('Edit') }}
                                            </x-primary-button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="flex flex-col items-center">
                    <h1 class="font-medium text-2xl">Belum ada data karyawan</h1>
                    <a href="{{ url('karyawan/create') }}">
                        <x-primary-button class="bg-gray-800">{{ __('+ Tambah Karyawan') }}</x-primary-button>
                    </a>
                </div>
            @endif
        </x-pages>
</x-main>
