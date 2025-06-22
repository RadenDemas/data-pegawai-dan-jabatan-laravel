<?php

namespace App\Livewire\Absensi;

use Livewire\Component;
use App\Models\Pegawai;
use App\Models\Absensi;
use App\Models\Cuti;
use Carbon\Carbon;

class Create extends Component
{
    public $tanggal;
    public $dataAbsensi = [];

    public function mount()
    {
        $this->tanggal = Carbon::now()->toDateString();

        $pegawais = Pegawai::with([
            'cuti' => function ($q) {
                $q->whereDate('tanggal_mulai', '<=', $this->tanggal)
                    ->whereDate('tanggal_akhir', '>=', $this->tanggal);
            },
            'absensis' => function ($q) {
                $q->whereDate('tanggal', $this->tanggal);
            }
        ])->get();

        foreach ($pegawais as $pegawai) {
            // Cek apakah ada data absensi sebelumnya
            $absensiSebelumnya = $pegawai->absensis->first();

            $this->dataAbsensi[] = [
                'pegawai_id' => $pegawai->id,
                'nama' => $pegawai->nama,
                'status' => $pegawai->cuti->count() > 0 ? 'cuti' : ($absensiSebelumnya->status ?? null),
                'isCuti' => $pegawai->cuti->count() > 0
            ];
        }
    }

    public function simpan()
    {
        foreach ($this->dataAbsensi as $absensi) {
            Absensi::updateOrCreate(
                ['pegawai_id' => $absensi['pegawai_id'], 'tanggal' => $this->tanggal],
                ['status' => $absensi['status'] ?? 'tidak_hadir']
            );
        }

        session()->flash('message', 'Absensi berhasil disimpan.');
        return redirect()->route('absensi.index');
    }

    public function render()
    {
        return view('livewire.absensi.create')->layout('layouts.app', ['title' => 'Absensi Hari Ini']);
    }
}
