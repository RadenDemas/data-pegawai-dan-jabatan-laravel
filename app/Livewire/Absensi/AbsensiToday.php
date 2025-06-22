<?php

namespace App\Livewire\Absensi;

use Livewire\Component;
use App\Models\Pegawai;
use App\Models\Absensi;
use Carbon\Carbon;

class Index extends Component
{
    public $tanggal;

    public function mount()
    {
        $this->tanggal = Carbon::now()->toDateString();
    }

    public function render()
    {
        $pegawais = Pegawai::with(['absensis' => function ($q) {
            $q->where('tanggal', $this->tanggal);
        }])->get();

        return view('livewire.absensi.absensi-today', compact('pegawais'))
            ->layout('layouts.app', ['title' => 'Rekap Absensi']);
    }
}
