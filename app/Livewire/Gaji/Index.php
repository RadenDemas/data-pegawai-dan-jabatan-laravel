<?php

namespace App\Livewire\Gaji;

use Livewire\Component;
use App\Models\Pegawai;

class Index extends Component
{
    public function render()
    {
        $pegawais = Pegawai::with('jabatan')->get();

        return view('livewire.gaji.index', [
            'pegawais' => $pegawais
        ]);
    }
}
