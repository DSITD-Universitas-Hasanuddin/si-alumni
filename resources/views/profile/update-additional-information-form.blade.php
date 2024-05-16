<x-form-section submit="updateAdditionalInformation">
    <x-slot name="title">
        {{ __('Additional Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s additional profile information.') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">
            <x-label for="jurusan" value="{{ __('Program Studi') }}" />
            <x-wireui.input id="jurusan" type="text" class="mt-1 block w-full" disabled wire:model.defer="state.jurusan" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="angkatan" value="{{ __('Angkatan') }}" />
            <x-wireui.inputs.maskable mask="####" id="angkatan" type="tel" class="mt-1 block w-full" wire:model.defer="state.angkatan" />
            <x-input-error for="angkatan" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="instagram_account" value="{{ __('Akun Instagram') }}" />
            <x-wireui.input id="instagram_account" type="text" class="mt-1 block w-full" wire:model.defer="state.instagram_account" />
            <x-input-error for="instagram_account" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="profile_desc" value="{{ __('Deskripsi Profil') }}" />
            <x-wireui.textarea id="profile_desc" type="text" class="mt-1 block w-full" wire:model.defer="state.profile_desc" />
            <x-input-error for="profile_desc" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="tempat_kerja" value="{{ __('Tempat Kerja') }}" />
            <x-wireui.input id="tempat_kerja" type="text" class="mt-1 block w-full" wire:model.defer="state.tempat_kerja" />
            <x-input-error for="tempat_kerja" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="nama_perusahaan" value="{{ __('Nama Perusahaan') }}" />
            <x-wireui.input id="nama_perusahaan" type="text" class="mt-1 block w-full" wire:model.defer="state.nama_perusahaan" />
            <x-input-error for="nama_perusahaan" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="jabatan" value="{{ __('Jabatan') }}" />
            <x-wireui.input id="jabatan" type="text" class="mt-1 block w-full" wire:model.defer="state.jabatan" />
            <x-input-error for="jabatan" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="provinsi" value="{{ __('Provinsi') }}" />
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="faculty" name="provinsi"  wire:model.defer="state.provinsi">
                    <option value="Aceh">Aceh</option>
                    <option value="Sumatera Utara" >Sumatera Utara</option>
                    <option value="Sumatera Barat" >Sumatera Barat</option>
                    <option value="Riau" >Riau</option>
                    <option value="Kepulauan Riau" >Kepulauan Riau</option>
                    <option value="Kepulauan Bangka Belitung" >Kepulauan Bangka Belitung</option>
                    <option value="Bengkulu" >Bengkulu</option>
                    <option value="Jawa Barat" >Jawa Barat</option>
                    <option value="Jawa Tengah" >Jawa Tengah</option>
                    <option value="DI Yogyakarta" >DI Yogyakarta</option>
                    <option value="Jawa Timur" >Jawa Timur</option>
                    <option value="Bali" >Bali</option>
                    <option value="Nusa Tenggara Barat" >Nusa Tenggara Barat</option>
                    <option value="Nusa Tenggara Timur" >Nusa Tenggara Timur</option>
                    <option value="Kalimantan Barat" >Kalimantan Barat</option>
                    <option value="Kalimantan Selatan" >Kalimantan Selatan</option>
                    <option value="Kalimantan Timur" >Kalimantan Timur</option>
                    <option value="Kalimantan Utara" >Kalimantan Utara</option>
                    <option value="Sulawesi Utara" >Sulawesi Utara</option>
                    <option value="Gorontalo" >Gorontalo</option>
                    <option value="Sulawesi Tengah" >Sulawesi Tengah</option>
                    <option value="Sulawesi Barat" >Sulawesi Barat</option>
                    <option value="Sulawesi Selatan" >Sulawesi Selatan</option>
                    <option value="Sulawesi Tenggara" >Sulawesi Tenggara</option>
                    <option value="Maluku" >Maluku</option>
                    <option value="Maluku Utara" >Maluku Utara</option>
                    <option value="Papua" >Papua</option>
                    <option value="Papua Barat" >Papua Barat</option>
                    <option value="Papua Tengah" >Papua Tengah</option>
                    <option value="Papua Pegunungan" >Papua Pegunungan</option>
                    <option value="Papua Selatan" >Papua Selatan</option>
                    <option value="Papua Barat Daya" >Papua Barat Daya</option>
                    <option value="Luar Negeri">Luar Negeri</option>
                </select>
            {{-- <x-wireui.input id="provinsi" type="text" class="mt-1 block w-full" wire:model.defer="state.provinsi" />
            <x-input-error for="provinsi" class="mt-2" /> --}}
            
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="kota" value="{{ __('Kota') }}" />
            <x-wireui.input id="kota" type="text" class="mt-1 block w-full" wire:model.defer="state.kota" />
            <x-input-error for="kota" class="mt-2" />
        </div>
    </x-slot>
    <x-slot name="actions">
        <x-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
