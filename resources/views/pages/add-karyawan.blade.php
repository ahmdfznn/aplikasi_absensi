<x-main>
    <x-slot:title>{{ $title }}</x-slot>
        <x-pages>
            <form action="{{ url('karyawan') }}" method="post" class="flex flex-col items-center w-full"
                enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col w-full">
                    <x-label for="image">Foto Profile</x-label>
                    <div class="w-96 overflow-hidden flex justify-center items-center">
                        <img src="" alt="" class="img-preview w-96">
                    </div>
                </div>
                <x-text-input type="file" name="profile_picture" id="image" autofocus
                    accept=".jpg, .jpeg, .png" />
                <div class="flex flex-col w-full">
                    <x-label for="nip" :value="__('Nip')" />
                    <x-text-input name="nip" id="name" autofocus value="{{ old('nip') }}" />
                    @error('nip')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <x-label for="nama" :value="__('Nama')" />
                    <x-text-input name="nama" id="nama" value="{{ old('nama') }}" />
                    @error('nama')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <x-label for="nik" :value="__('Nik')" />
                    <x-text-input name="nik" id="nik" value="{{ old('nik') }}" />
                    @error('nik')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <div class="flex flex-col items-start w-full">
                    <x-label :value="__('Jenis Kelamin')" />
                    <div class="w-1/4 flex justify-around">
                        <div class="flex items-center justify-between w-[4vw] my-2">
                            <input type="radio" name="jenis_kelamin" id="pria" value="Pria"
                                {{ old('jenis_kelamin') == 'Pria' ? 'checked' : '' }}>
                            <x-label for="pria" :value="__('Pria')" />
                        </div>
                        <div class="flex items-center justify-between w-[6vw]">
                            <input type="radio" name="jenis_kelamin" id="wanita" value="Wanita"
                                {{ old('jenis_kelamin') == 'Wanita' ? 'checked' : '' }}>
                            <x-label for="wanita" :value="__('Wanita')" />
                        </div>
                    </div>
                    @error('jenis_kelamin')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <x-label for="jabatan" :value="__('Jabatan')" />
                    <x-text-input name="jabatan" id="jabatan" value="{{ old('jabatan') }}" />
                    @error('jabatan')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <x-label for="tempat_lahir" :value="__('Tempat Lahir')" />
                    <x-text-input name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" />
                    @error('tempat_lahir')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <x-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                    <x-text-input name="tanggal_lahir" id="tanggal_lahir" type="date"
                        value="{{ old('tanggal_lahir') }}" />
                    @error('tanggal_lahir')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <x-label for="no_telepon" :value="__('Nomor Telepon')" />
                    <x-text-input name="no_telepon" id="no_telepon" value="{{ old('no_telepon') }}" />
                    @error('no_telepon')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <x-label for="alamat" :value="__('Alamat')" />
                    <textarea
                        class="resize-none w-full h-[20vh] border border-gray-400 focus:outline-2 focus:outline-green-500 focus:shadow-input rounded-lg p-2 my-2"
                        name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <x-error>{{ $message }}</x-error>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <x-label for="keterangan" :value="__('Keterangan')" />
                    <textarea
                        class="resize-none w-full h-[20vh] border border-gray-400 focus:outline-2 focus:outline-green-500 focus:shadow-input rounded-lg p-2 my-2"
                        name="keterangan" id="keterangan">{{ old('keterangan') }}</textarea>
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
