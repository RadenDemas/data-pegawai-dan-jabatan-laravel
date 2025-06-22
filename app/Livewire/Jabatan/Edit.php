<?php
namespace App\Livewire\Jabatan;

use Livewire\Component;
use App\Models\Jabatan;

class Edit extends Component
{
    public $jabatan_id, $nama_jabatan, $tunjangan;

    public function mount(Jabatan $jabatan)
    {
        $this->jabatan_id = $jabatan->id;
        $this->nama_jabatan = $jabatan->nama_jabatan;
        $this->tunjangan = $jabatan->tunjangan;
    }

    public function update()
    {
        $this->validate([
            'nama_jabatan' => 'required|string|max:255',
            'tunjangan' => 'required|numeric|min:0',
        ]);

        Jabatan::where('id', $this->jabatan_id)->update([
            'nama_jabatan' => $this->nama_jabatan,
            'tunjangan' => $this->tunjangan,
        ]);

        session()->flash('message', 'Jabatan berhasil diperbarui.');
        return redirect()->route('jabatan.index');
    }

    public function render()
    {
        return view('livewire.jabatan.edit')->layout('layouts.app', ['title' => 'Edit Jabatan']);
    }
}
