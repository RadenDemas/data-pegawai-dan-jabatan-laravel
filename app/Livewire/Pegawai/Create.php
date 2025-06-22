<?php

namespace App\Livewire\Pegawai;

use Livewire\Component;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\UnitKerja;

class Create extends Component
{
    public $nip, $nama, $jabatan_id, $unit_kerja_id, $gaji;

    public function simpan()
    {
        $this->validate([
            'nip' => 'required|unique:pegawais,nip',
            'nama' => 'required|string|max:255',
            'jabatan_id' => 'required|exists:jabatans,id',
            'unit_kerja_id' => 'required|exists:unit_kerjas,id',
            'gaji' => 'required|numeric|min:0',
        ]);

        Pegawai::create([
            'nip' => $this->nip,
            'nama' => $this->nama,
            'jabatan_id' => $this->jabatan_id,
            'unit_kerja_id' => $this->unit_kerja_id,
            'gaji' => $this->gaji,
        ]);

        session()->flash('message', 'Pegawai berhasil ditambahkan.');
        return redirect()->route('pegawai.index');
    }

    public function render()
    {
        return view('livewire.pegawai.create', [
            'jabatans' => Jabatan::all(),
            'unitKerjas' => UnitKerja::all(),
        ])->layout('layouts.app', ['title' => 'Tambah Pegawai']);
    }
}
