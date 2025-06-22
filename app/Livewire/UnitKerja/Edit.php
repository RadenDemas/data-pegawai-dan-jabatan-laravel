<?php

namespace App\Livewire\UnitKerja;

use Livewire\Component;
use App\Models\UnitKerja;

class Edit extends Component
{
    public $unitkerja_id, $nama_unit, $lokasi;

    public function mount(UnitKerja $unitKerja)
    {
        $this->unitkerja_id = $unitKerja->id;
        $this->nama_unit = $unitKerja->nama_unit;
        $this->lokasi = $unitKerja->lokasi;
    }

    public function update()
    {
        $this->validate([
            'nama_unit' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        UnitKerja::where('id', $this->unitkerja_id)->update([
            'nama_unit' => $this->nama_unit,
            'lokasi' => $this->lokasi,
        ]);

        session()->flash('message', 'Unit Kerja berhasil diperbarui.');
        return redirect()->route('unitkerja.index');
    }

    public function render()
    {
        return view('livewire.unit-kerja.edit')->layout('layouts.app', ['title' => 'Edit Unit Kerja']);
    }
}
