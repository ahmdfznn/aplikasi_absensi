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
                    <div class="flex justify-between">
                        <div>
                            <a href="{{ url('karyawan/create') }}">
                                <x-primary-button class="bg-gray-800">{{ __('+ Tambah Karyawan') }}</x-primary-button>
                            </a>
                            <h1 class="font-medium text-xl">{{ $karyawan->count() }} Karyawan</h1>

                        </div>
                        <div class="flex justify-end items-center w-3/4">
                            <x-text-input type="search" class="h-10" placeholder="Search..." id="search" />
                        </div>
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
                                <tr class="border-b border-slate-400 text-center odd:bg-slate-200 item">
                                    <td class="p-2">{{ $loop->iteration }}.</td>
                                    <td class="p-2">{{ $data->nip }}</td>
                                    <td class="p-2 nama">{{ Str::limit($data->nama, '10', '...') }}</td>
                                    <td class="p-2">{{ $data->nik }}</td>
                                    <td class="p-2">{{ Str::limit($data->jabatan, '10', '...') }}</td>
                                    <td class="p-2">{{ $data->jenis_kelamin }}</td>
                                    <td class="p-2">{{ Str::limit($data->tempat_lahir, '10', '...') }}</td>
                                    <td class="p-2">{{ $data->tanggal_lahir }}</td>
                                    <td class="p-2">{{ $data->no_telepon }}</td>
                                    <td class="p-2">{{ Str::limit($data->alamat, '10', '...') }}</td>
                                    <td class="flex items-center p-2">
                                        <a href="{{ url('karyawan/' . $data->nama . '/edit') }}">
                                            <x-primary-button class="bg-gray-800">{{ __('Edit') }}
                                            </x-primary-button>
                                        </a>
                                        <form action="{{ url('karyawan/' . $data->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <x-submit-button class="bg-red-600"
                                                onclick="return confirm('Apakah yakin anda ingin menghapus?')">
                                                {{ __('Hapus') }}
                                            </x-submit-button>
                                        </form>
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


        <script>
            $(document).ready(function() {
                $("#search").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("table .item").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    })
                })
            })
        </script>
</x-main>
