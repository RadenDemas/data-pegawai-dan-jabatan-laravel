<?php

namespace App\Livewire\Pegawai;

use Livewire\Component;
use App\Models\Pegawai;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pegawai.index', [
            'pegawais' => Pegawai::with(['jabatan', 'unitKerja'])->orderBy('created_at', 'desc')->get()
        ])->layout('layouts.app', ['title' => 'Data Pegawai']);
    }
    public function deletepegawai($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        session()->flash('message', 'Pegawai berhasil dihapus.');
        return redirect()->route('pegawai.index');
    }
}
