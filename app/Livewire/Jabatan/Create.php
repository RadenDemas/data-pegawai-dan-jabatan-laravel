<?php
namespace App\Livewire\Jabatan;

use Livewire\Component;
use App\Models\Jabatan;

class Create extends Component
{
    public $nama_jabatan, $tunjangan;

    public function simpan()
    {
        $this->validate([
            'nama_jabatan' => 'required|string|max:255',
            'tunjangan' => 'required|numeric|min:0',
        ]);

        Jabatan::create([
            'nama_jabatan' => $this->nama_jabatan,
            'tunjangan' => $this->tunjangan,
        ]);

        session()->flash('message', 'Jabatan berhasil ditambahkan.');
        return redirect()->route('jabatan.index');
    }

    public function render()
    {
        return view('livewire.jabatan.create')->layout('layouts.app', ['title' => 'Tambah Jabatan']);
    }
}
