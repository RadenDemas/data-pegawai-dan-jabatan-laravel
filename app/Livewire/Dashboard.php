<?php

namespace App\Livewire;

use App\Models\Absensi;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\UnitKerja;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $today = Carbon::now()->toDateString();

        return view('livewire.dashboard', [
            'pegawai' => Pegawai::count(),
            'jabatan' => Jabatan::count(),
            'unitKerja' => UnitKerja::count(),

            'hadir' => Absensi::where('tanggal', $today)->where('status', 'hadir')->count(),
            'izin' => Absensi::where('tanggal', $today)->where('status', 'izin')->count(),
            'sakit' => Absensi::where('tanggal', $today)->where('status', 'sakit')->count(),
            'tidak_hadir' => Absensi::where('tanggal', $today)->where('status', 'tidak_hadir')->count(),
            'cuti' => Absensi::where('tanggal', $today)->where('status', 'cuti')->count(),
        ])->layout('layouts.app');
    }
}
