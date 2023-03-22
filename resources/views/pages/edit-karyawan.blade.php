<x-main>
    <x-slot:title>{{ $title }}</x-slot>
        <x-pages>
            <form action="{{ url('karyawan/' . $data->nama) }}" method="post" class="flex flex-col items-center w-full"
                enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="flex flex-col items-center w-full">
                    <x-label for="image">Foto Profile</x-label>
                    <div
                        class="w-96 h-96 rounded-full overflow-hidden flex justify-center items-center my-5 border-2 border-indigo-600">
                        <img src="{{ asset('storage/' . $data->profile_picture) }}" alt=""
                            class="img-preview w-96">
                    </div>
                </div>
                <x-text-input type="file" name="profile_picture" id="image" autofocus
                    accept=".jpg, .jpeg, .png" />
                <div class="flex flex-col w-full">
                    <x-label for="nip" :value="__('Nip')" />
                    <x-text-input name="nip" id="name" autofocus value="{{ $data->nip }}" />
                    @error('nip')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <x-label for="nama" :value="__('Nama')" />
                    <x-text-input name="nama" id="nama" value="{{ $data->nama }}" />
                    @error('nama')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <x-label for="nik" :value="__('Nik')" />
                    <x-text-input name="nik" id="nik" value="{{ $data->nik }}" />
                    @error('nik')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <div class="flex flex-col items-start w-full">
                    <x-label :value="__('Jenis Kelamin')" />
                    <div class="w-1/4 flex justify-around">
                        <div class="flex items-center justify-between w-[4vw] my-2">
                            <input type="radio" name="jenis_kelamin" id="pria" value="Pria"
                                {{ $data->jenis_kelamin == 'Pria' ? 'checked' : '' }}>
                            <x-label for="pria" :value="__('Pria')" />
                        </div>
                        <div class="flex items-center justify-between w-[6vw]">
                            <input type="radio" name="jenis_kelamin" id="wanita" value="Wanita"
                                {{ $data->jenis_kelamin == 'Wanita' ? 'checked' : '' }}>
                            <x-label for="wanita" :value="__('Wanita')" />
                        </div>
                    </div>
                    @error('jenis_kelamin')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <x-label for="jabatan" :value="__('Jabatan')" />
                    <x-text-input name="jabatan" id="jabatan" value="{{ $data->jabatan }}" />
                    @error('jabatan')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <x-label for="tempat_lahir" :value="__('Tempat Lahir')" />
                    <x-text-input name="tempat_lahir" id="tempat_lahir" value="{{ $data->tempat_lahir }}" />
                    @error('tempat_lahir')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <x-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                    <x-text-input name="tanggal_lahir" id="tanggal_lahir" type="date"
                        value="{{ $data->tanggal_lahir }}" />
                    @error('tanggal_lahir')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <x-label for="no_telepon" :value="__('Nomor Telepon')" />
                    <x-text-input name="no_telepon" id="no_telepon" value="{{ $data->no_telepon }}" />
                    @error('no_telepon')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <x-label for="alamat" :value="__('Alamat')" />
                    <textarea
                        class="resize-none w-full h-[20vh] border border-gray-400 focus:outline-2 focus:outline-green-500 focus:shadow-input rounded-lg p-2 my-2"
                        name="alamat" id="alamat">{{ $data->alamat }}</textarea>
                    @error('alamat')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <x-label for="keterangan" :value="__('Keterangan')" />
                    <textarea
                        class="resize-none w-full h-[20vh] border border-gray-400 focus:outline-2 focus:outline-green-500 focus:shadow-input rounded-lg p-2 my-2"
                        name="keterangan" id="keterangan">{{ $data->keterangan }}</textarea>
                    @error('keterangan')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <x-submit-button class="bg-gray-800 w-full">{{ __('Submit') }}</x-submit-button>
            </form>
        </x-pages>

        <script>
            const img = document.querySelector('#image')
            $('#image').change(function(e) {

                const reader = new FileReader()
                reader.readAsDataURL(img.files[0])

                $(reader).on('load', function(e) {
                    $('.img-preview').attr('src', e.target.result)
                })
            })
        </script>
</x-main>
