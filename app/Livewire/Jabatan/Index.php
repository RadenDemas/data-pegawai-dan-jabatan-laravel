<?php

namespace App\Livewire\Jabatan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Jabatan;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deletejabatan($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        session()->flash('message', 'Jabatan berhasil dihapus.');
        return redirect()->route('jabatan.index');
    }

    public function render()
    {
        $jabatans = Jabatan::when($this->search, fn($q) => $q->where('nama_jabatan', 'like', '%' . $this->search . '%'))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.jabatan.index', compact('jabatans'))
            ->layout('layouts.app', ['title' => 'Daftar Jabatan']);
    }
}
