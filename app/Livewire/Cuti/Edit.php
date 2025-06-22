<?php

namespace App\Livewire\Cuti;

use Livewire\Component;
use App\Models\Cuti;
use App\Models\Pegawai;

class Edit extends Component
{
    public $cutiId;
    public $pegawai_id, $tanggal_mulai, $tanggal_akhir, $alasan;

    public function mount($id)
    {
        $cuti = Cuti::findOrFail($id);
        $this->cutiId = $cuti->id;
        $this->pegawai_id = $cuti->pegawai_id;
        $this->tanggal_mulai = $cuti->tanggal_mulai;
        $this->tanggal_akhir = $cuti->tanggal_akhir;
        $this->alasan = $cuti->alasan;
    }

    public function update()
    {
        $this->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string|max:255',
        ]);

        $cuti = Cuti::findOrFail($this->cutiId);
        $cuti->update([
            'pegawai_id' => $this->pegawai_id,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_akhir' => $this->tanggal_akhir,
            'alasan' => $this->alasan,
        ]);

        session()->flash('message', 'Cuti berhasil diperbarui.');
        return redirect()->route('cuti.index');
    }

    public function render()
    {
        return view('livewire.cuti.edit', [
            'pegawais' => Pegawai::all(),
        ])->layout('layouts.app', ['title' => 'Edit Cuti']);
    }
}
