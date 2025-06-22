<?php

namespace App\Livewire\Absensi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RekapAbsensi extends Component
{
    use WithPagination;

    public $bulan;
    public $tahun;
    public $search;

    protected $queryString = ['bulan', 'tahun', 'search'];

    public function mount()
    {
        $now = Carbon::now();
        $this->bulan = $this->bulan ?? $now->format('m');
        $this->tahun = $this->tahun ?? $now->year;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // Ambil pegawai sesuai search
        $pegawais = Pegawai::when($this->search, function ($query) {
            $query->where('nama', 'like', '%' . $this->search . '%');
        })
            ->orderBy('nama')
            ->paginate(10);

        // Rekap absensi bulanan per pegawai
        $rekap = DB::table('absensis')
            ->select(
                'pegawai_id',
                DB::raw("SUM(CASE WHEN status = 'hadir' THEN 1 ELSE 0 END) as hadir"),
                DB::raw("SUM(CASE WHEN status = 'izin' THEN 1 ELSE 0 END) as izin"),
                DB::raw("SUM(CASE WHEN status = 'sakit' THEN 1 ELSE 0 END) as sakit"),
                DB::raw("SUM(CASE WHEN status = 'tidak_hadir' THEN 1 ELSE 0 END) as tidak_hadir"),
                DB::raw("SUM(CASE WHEN status = 'cuti' THEN 1 ELSE 0 END) as cuti")
            )
            ->whereMonth('tanggal', $this->bulan)
            ->whereYear('tanggal', $this->tahun)
            ->groupBy('pegawai_id')
            ->get()
            ->keyBy('pegawai_id');

        return view('livewire.absensi.rekap-absensi', [
            'pegawais' => $pegawais,
            'rekap' => $rekap,
        ])->layout('layouts.app', ['title' => 'Rekap Absensi Bulanan']);
    }
}
