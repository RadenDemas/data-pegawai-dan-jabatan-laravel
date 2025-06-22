<?php

namespace App\Livewire\Pegawai;

use Livewire\Component;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\UnitKerja;

class Edit extends Component
{
    public $pegawai_id, $nip, $nama, $jabatan_id, $unit_kerja_id, $gaji;

    public function mount(Pegawai $pegawai)
    {
        $this->pegawai_id = $pegawai->id;
        $this->nip = $pegawai->nip;
        $this->nama = $pegawai->nama;
        $this->jabatan_id = $pegawai->jabatan_id;
        $this->unit_kerja_id = $pegawai->unit_kerja_id;
        $this->gaji = $pegawai->gaji;
    }

    public function update()
    {
        $this->validate([
            'nip' => 'required|unique:pegawais,nip,' . $this->pegawai_id,
            'nama' => 'required|string|max:255',
            'jabatan_id' => 'required|exists:jabatans,id',
            'unit_kerja_id' => 'required|exists:unit_kerjas,id',
            'gaji' => 'required|numeric|min:0',
        ]);

        Pegawai::where('id', $this->pegawai_id)->update([
            'nip' => $this->nip,
            'nama' => $this->nama,
            'jabatan_id' => $this->jabatan_id,
            'unit_kerja_id' => $this->unit_kerja_id,
            'gaji' => $this->gaji,
        ]);

        session()->flash('message', 'Data Pegawai berhasil diperbarui.');
        return redirect()->route('pegawai.index');
    }

    public function render()
    {
        return view('livewire.pegawai.edit', [
            'jabatans' => Jabatan::all(),
            'unitKerjas' => UnitKerja::all(),
        ])->layout('layouts.app', ['title' => 'Edit Pegawai']);
    }
}
