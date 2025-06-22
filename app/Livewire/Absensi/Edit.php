<?php

namespace App\Livewire\Absensi;

use Livewire\Component;
use App\Models\Absensi;
use App\Models\Cuti;
use App\Models\Pegawai;

class Edit extends Component
{
    public $absensi_id, $pegawai_id, $tanggal, $status;
    public $isCuti = false;

    public function mount(Absensi $absensi)
    {
        $this->absensi_id = $absensi->id;
        $this->pegawai_id = $absensi->pegawai_id;
        $this->tanggal = $absensi->tanggal;
        $this->status = $absensi->status;

        $this->cekCuti();
    }

    public function updatedTanggal()
    {
        $this->cekCuti();
    }

    public function cekCuti()
    {
        $cuti = Cuti::where('pegawai_id', $this->pegawai_id)
            ->whereDate('tanggal_mulai', '<=', $this->tanggal)
            ->whereDate('tanggal_akhir', '>=', $this->tanggal)
            ->first();

        $this->isCuti = $cuti ? true : false;

        if ($this->isCuti) {
            $this->status = 'cuti';
        }
    }

    public function update()
    {
        $this->validate([
            'tanggal' => 'required|date',
            'status' => 'required|in:hadir,sakit,izin,tidak_hadir,cuti'
        ]);

        Absensi::where('id', $this->absensi_id)->update([
            'tanggal' => $this->tanggal,
            'status' => $this->status
        ]);

        session()->flash('message', 'Absensi berhasil diperbarui.');
        return redirect()->route('absensi.index');
    }

    public function render()
    {
        return view('livewire.absensi.edit', [
            'pegawai' => Pegawai::find($this->pegawai_id)
        ])->layout('layouts.app', ['title' => 'Edit Absensi']);
    }
}
