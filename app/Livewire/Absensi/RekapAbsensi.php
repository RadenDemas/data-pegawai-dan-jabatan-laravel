<?php

namespace App\Livewire\Absensi;

use Livewire\Component;
use App\Models\Pegawai;
use App\Models\Absensi;
use App\Models\Cuti;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RekapAbsensi extends Component
{
    public $bulan;
    public $tahun;

    public function mount()
    {
        $now = Carbon::now();
        $this->bulan = $now->month;
        $this->tahun = $now->year;
    }

    public function render()
    {
        $pegawaiList = Pegawai::all();

        $rekap = [];
        foreach ($pegawaiList as $pegawai) {
            $hadir = Absensi::where('pegawai_id', $pegawai->id)
                ->whereMonth('tanggal', $this->bulan)
                ->whereYear('tanggal', $this->tahun)
                ->where('status', 'hadir')
                ->count();

            $izin = Absensi::where('pegawai_id', $pegawai->id)
                ->whereMonth('tanggal', $this->bulan)
                ->whereYear('tanggal', $this->tahun)
                ->where('status', 'izin')
                ->count();

            $sakit = Absensi::where('pegawai_id', $pegawai->id)
                ->whereMonth('tanggal', $this->bulan)
                ->whereYear('tanggal', $this->tahun)
                ->where('status', 'sakit')
                ->count();

            $tidakHadir = Absensi::where('pegawai_id', $pegawai->id)
                ->whereMonth('tanggal', $this->bulan)
                ->whereYear('tanggal', $this->tahun)
                ->where('status', 'tidak_hadir')
                ->count();

            $cuti = Absensi::where('pegawai_id', $pegawai->id)
                ->whereMonth('tanggal', $this->bulan)
                ->whereYear('tanggal', $this->tahun)
                ->where('status', 'cuti')
                ->count();

            $rekap[] = [
                'nama' => $pegawai->nama,
                'hadir' => $hadir,
                'izin' => $izin,
                'sakit' => $sakit,
                'tidak_hadir' => $tidakHadir,
                'cuti' => $cuti,
            ];
        }

        return view('livewire.absensi.rekap-absensi', compact('rekap'))
            ->layout('layouts.app', ['title' => 'Rekap Absensi Bulanan']);
    }
}
