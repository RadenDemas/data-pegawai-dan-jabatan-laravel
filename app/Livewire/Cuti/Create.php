<?php

namespace App\Livewire\Cuti;

use Livewire\Component;
use App\Models\Cuti;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $pegawai_id, $tanggal_mulai, $tanggal_akhir, $alasan;

    public function simpan()
    {
        $this->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string|max:255',
        ]);

        $jumlahHari = now()->parse($this->tanggal_mulai)->diffInDays(now()->parse($this->tanggal_akhir)) + 1;

        $totalCutiTahunIni = Cuti::where('pegawai_id', $this->pegawai_id)
            ->whereYear('tanggal_mulai', now()->year)
            ->get()
            ->sum(fn($cuti) => $cuti->jumlah_hari);

        $sisaCuti = 12 - $totalCutiTahunIni;

        if ($jumlahHari > $sisaCuti) {
            $this->addError('tanggal_akhir', "Sisa cuti tidak mencukupi. Sisa cuti: {$sisaCuti} hari.");
            return;
        }

        Cuti::create([
            'pegawai_id' => $this->pegawai_id,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_akhir' => $this->tanggal_akhir,
            'alasan' => $this->alasan,
        ]);

        session()->flash('message', 'Pengajuan cuti berhasil disimpan.');
        return redirect()->route('cuti.index');
    }

    public function render()
    {
        return view('livewire.cuti.create', [
            'pegawais' => Pegawai::orderBy('nama')->get(),
        ])->layout('layouts.app', ['title' => 'Pengajuan Cuti']);
    }
}
