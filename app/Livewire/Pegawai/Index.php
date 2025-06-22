<?php

namespace App\Livewire\Pegawai;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pegawai;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deletepegawai($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        session()->flash('message', 'Pegawai berhasil dihapus.');
        return redirect()->route('pegawai.index');
    }

    public function render()
    {
        $pegawais = Pegawai::with(['jabatan', 'unitKerja'])
            ->when($this->search, fn($q) => $q->where('nama', 'like', '%' . $this->search . '%'))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.pegawai.index', compact('pegawais'))
            ->layout('layouts.app', ['title' => 'Data Pegawai']);
    }
}
