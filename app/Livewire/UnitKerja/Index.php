<?php

namespace App\Livewire\UnitKerja;

use Livewire\Component;
use App\Models\UnitKerja;

class Index extends Component
{
    public function render()
    {
        return view('livewire.unit-kerja.index', [
            'unitkerjas' => UnitKerja::orderBy('created_at', 'desc')->get()
        ])->layout('layouts.app', ['title' => 'Unit Kerja']);
    }
    public function deleteunitkerja($id)
    {
        $unitkerja = UnitKerja::findOrFail($id);
        $unitkerja->delete();

        session()->flash('message', 'Unit Kerja berhasil dihapus.');
        return redirect()->route('unitkerja.index');
    }
}
