<?php

namespace App\Livewire\Cuti;

use Livewire\Component;
use App\Models\Pegawai;
use App\Models\Cuti;

class Rekap extends Component
{
    public $tahun;
    public $daftarPegawai = [];

    public function mount()
    {
        $this->tahun = now()->year;
        $this->daftarPegawai = Pegawai::with(['cutis' => function ($query) {
            $query->whereYear('tanggal_mulai', $this->tahun);
        }])->orderBy('nama')->get();
    }

    public function updatedTahun()
    {
        $this->mount();
    }

    public function render()
    {
        return view('livewire.cuti.rekap')->layout('layouts.app', ['title' => 'Rekap Cuti Tahunan']);
    }
}
