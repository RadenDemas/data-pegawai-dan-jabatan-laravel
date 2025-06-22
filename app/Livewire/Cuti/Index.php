<?php

namespace App\Livewire\Cuti;

use Livewire\Component;
use App\Models\Cuti;

class Index extends Component
{
    public function render()
    {
        return view('livewire.cuti.index', [
            'cutis' => Cuti::with('pegawai')->orderBy('tanggal_mulai', 'desc')->get(),
        ])->layout('layouts.app', ['title' => 'Daftar Cuti']);
    }
    public function hapus($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->delete();

        session()->flash('message', 'Pengajuan cuti berhasil dihapus.');
    }
}
