<?php

namespace App\Livewire\RekapAbsensi;

use Livewire\Component;
use App\Models\Absensi;
use App\Models\Pegawai;
use Carbon\Carbon;

class Index extends Component
{
    public $bulan;
    public $tahun;

    public function mount()
    {
        $today = Carbon::today();
        $this->bulan = $today->format('m');
        $this->tahun = $today->format('Y');
    }

    public function render()
    {
        $rekap = Pegawai::with(['absensis' => function ($query) {
            $query->whereMonth('tanggal', $this->bulan)
                ->whereYear('tanggal', $this->tahun);
        }])->get();

        return view('livewire.rekap-absensi.index', [
            'rekap' => $rekap,
        ]);
    }
}
