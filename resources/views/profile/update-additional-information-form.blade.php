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
            <x-label for="level_perusahaan" value="{{ __('Level Perusahaan') }}" />
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="level_perusahaan" name="level_perusahaan"  wire:model.defer="state.level_perusahaan">
                    <option value="Multinasional" >Multinasional</option>
                    <option value="Nasional" >Nasional</option>
                </select>
            {{-- <x-wireui.input id="provinsi" type="text" class="mt-1 block w-full" wire:model.defer="state.provinsi" />
            <x-input-error for="provinsi" class="mt-2" /> --}}
        </div>
        <div x-data="{ selectedOption: '', otherInput: '' }" class="col-span-6 sm:col-span-4">
            <x-label for="jenis_perusahaan" value="{{ __('Jenis Perusahaan') }}" />
            <select x-model="selectedOption" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="jenis_perusahaan" name="jenis_perusahaan" wire:model.defer="state.jenis_perusahaan">
                <option value="{{ $this->state['jenis_perusahaan'] }}">{{ $this->state['jenis_perusahaan'] }}</option>
                <option value="Agriculture / Fishing / Forestry">Agriculture / Fishing / Forestry</option>
                <option value="Construction / Real Estate">Construction / Real Estate</option>
                <option value="Consulting/Professional Services">Consulting/Professional Services</option>
                <option value="Consumer Goods">Consumer Goods</option>
                <option value="Education">Education</option>
                <option value="Engineering">Engineering</option>
                <option value="Entertainment / Leisure">Entertainment / Leisure</option>
                <option value="Finance / Banking">Finance / Banking</option>
                <option value="Government/Public sector">Government/Public sector</option>
                <option value="Health/Medical">Health/Medical</option>
                <option value="Hospitality / Travel / Tourism">Hospitality / Travel / Tourism</option>
                <option value="HR / Recruitment / Training">HR / Recruitment / Training</option>
                <option value="Law">Law</option>
                <option value="Logistics/Transportation Manufacturing">Logistics/Transportation Manufacturing</option>
                <option value="Media / Advertising">Media / Advertising</option>
                <option value="Metals / Mining">Metals / Mining</option>
                <option value="Non-profit/ Charity">Non-profit/ Charity</option>
                <option value="Other">Lainnya</option>
            </select>
            <div x-show="selectedOption === 'Other'" class="mt-2">
                <x-label for="jenis_perusahaan_lainnya" value="{{ __('Input Jenis Perusahaan') }}" />
                <input type="text" id="jenis_perusahaan_lainnya" name="jenis_perusahaan_lainnya" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" x-model="otherInput" wire:model.defer="state.jenis_perusahaan_lainnya" />
            </div>
        </div>
        <div x-data="{ selectedOption: '', otherInput: '' }" class="col-span-6 sm:col-span-4">
            <x-label for="jabatan" value="{{ __('Jabatan') }}" />
            <select x-model="selectedOption" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="jabatan" name="jabatan" wire:model.defer="state.jabatan">
                <option value="{{ $this->state['jabatan'] }}">{{ $this->state['jabatan'] }}</option>
                <option value="Tingkat Direktur(misal, Direktur Utama, Direktur Operasional, Direktur Keuangnan" >Tingkat Direktur(misal, Direktur Utama, Direktur Operasional, Direktur Keuangan)</option>
                <option value="Direktur" >Direktur</option>
                <option value="HRD (SDM) Profesional" >HRD (SDM) Profesional</option>
                <option value="Manajer" >Manajer</option>
                <option value="Konsultan/Penasihat" >Konsultan/Penasihat</option>
                <option value="Analis/Spesialis" >Analis/Spesialis</option>
                <option value="Other" >Lainnya: …</option>
            </select>
            <div x-show="selectedOption === 'Other'" class="mt-2">
                <x-label for="jabatan_lainnya" value="{{ __('Input Jabatan') }}" />
                <input type="text" id="jabatan_lainnya" name="jabatan_lainnya" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" x-model="otherInput" wire:model.defer="state.jabatan_lainnya" />
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="provinsi" value="{{ __('Provinsi Tempat Kerja') }}" />
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="provinsi" name="provinsi"  wire:model.defer="state.provinsi">
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
            <x-label for="kota" value="{{ __('Kota/Kabupaten Tempat Kerja') }}" />
            <x-wireui.input id="kota" type="text" class="mt-1 block w-full" wire:model.defer="state.kota" />
            <x-input-error for="kota" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="alamat_perusahaan" value="{{ __('Alamat Perusahaan') }}" />
            <x-wireui.input id="alamat_perusahaan" type="text" class="mt-1 block w-full" wire:model.defer="state.alamat_perusahaan" />
            <x-input-error for="alamat_perusahaan" class="mt-2" />
        </div>
    </x-slot>
    <x-slot name="actions">
        <x-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
