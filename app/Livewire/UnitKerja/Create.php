<?php

namespace App\Livewire\UnitKerja;

use Livewire\Component;
use App\Models\UnitKerja;

class Create extends Component
{
    public $nama_unit, $lokasi;

    public function simpan()
    {
        $this->validate([
            'nama_unit' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        UnitKerja::create([
            'nama_unit' => $this->nama_unit,
            'lokasi' => $this->lokasi,
        ]);

        session()->flash('message', 'Unit Kerja berhasil ditambahkan.');
        return redirect()->route('unitkerja.index');
    }

    public function render()
    {
        return view('livewire.unit-kerja.create')->layout('layouts.app', ['title' => 'Tambah Unit Kerja']);
    }
}
