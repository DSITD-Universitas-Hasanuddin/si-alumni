<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use WireUi\Traits\Actions;

class UpdateAdditionalInformationForm extends Component
{
    use Actions;
    public $state = [];

    public function mount()
    {
        $this->state = Auth::user()->withoutRelations()->toArray();
    }

    public function updateAdditionalInformation()
    {
        $this->resetErrorBag();

        // $options = [
        //     ['id' => 1, 'name' => 'Option 1'],
        //     ['id' => 2, 'name' => 'Option 2'],
        //     ['id' => 3, 'name' => 'Option 3'],
        // ];

        Validator::make($this->state, [
            'jurusan' => ['nullable', 'string', 'max:255'],
            'angkatan' => ['nullable', 'integer', 'max_digits:4'],
            'instagram_account' => ['nullable', 'string', 'max:255'],
            'profile_desc' => ['nullable', 'string', 'max:255'],
            'tempat_kerja' => ['nullable', 'string', 'max:255'],
            'nama_perusahaan' => ['nullable', 'string', 'max:255'],
            'jabatan' => ['nullable', 'string', 'max:255'],
            'jabatan_lainnya' => ['nullable', 'string', 'max:255'],
            'provinsi' => ['nullable', 'string', 'max:255'],
            'kota' => ['nullable', 'string', 'max:255'],
            'level_perusahaan' => ['nullable', 'string', 'max:255'],
            'jenis_perusahaan' => ['nullable', 'string', 'max:255'],
            'jenis_perusahaan_lainnya' => ['nullable', 'string', 'max:255'],
            'alamat_perusahaan' => ['nullable', 'string', 'max:255'],

        ])->validateWithBag('updateAdditionalInformation');

        $user = Auth::user();
        $user->angkatan = $this->state['angkatan'];
        $user->instagram_account = $this->state['instagram_account'];
        $user->profile_desc = $this->state['profile_desc'];
        $user->tempat_kerja = $this->state['tempat_kerja'];
        $user->nama_perusahaan = $this->state['nama_perusahaan'];
        $user->jabatan = $this->state['jabatan'];
        $user->jabatan = $this->state['jabatan'] === 'Other'
            ? $this->state['jabatan_lainnya']
            : $this->state['jabatan'];
        $user->provinsi = $this->state['provinsi'];
        $user->kota = $this->state['kota'];
        $user->level_perusahaan = $this->state['level_perusahaan'];
        $user->jenis_perusahaan = $this->state['jenis_perusahaan'];
        $user->jenis_perusahaan = $this->state['jenis_perusahaan'] === 'Other'
            ? $this->state['jenis_perusahaan_lainnya']
            : $this->state['jenis_perusahaan'];
        $user->alamat_perusahaan = $this->state['alamat_perusahaan'];
        $user->save();
        $this->notification()->send([
            'title' => 'Profile saved',
            'description' => 'Your profile was successfully saved',
            'icon' => 'success',
            'timeout' => 3000
        ]);
    }

    public function getUserProperty()
    {
        return Auth::user();
    }

    public function render()
    {
        return view('profile.update-additional-information-form');
    }
}