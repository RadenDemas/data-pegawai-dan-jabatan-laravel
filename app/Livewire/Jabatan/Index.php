<?php

namespace App\Livewire\Jabatan;

use Livewire\Component;
use App\Models\Jabatan;

class Index extends Component
{
    public function render()
    {
        return view('livewire.jabatan.index', [
            'jabatans' => Jabatan::orderBy('created_at', 'desc')->get()
        ])->layout('layouts.app', ['title' => 'Daftar Jabatan']);
    }
    public function deletejabatan($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        session()->flash('message', 'Jabatan berhasil dihapus.');
        return redirect()->route('jabatan.index');
    }
}
