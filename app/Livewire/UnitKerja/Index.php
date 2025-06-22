<?php

namespace App\Livewire\UnitKerja;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\UnitKerja;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteunitkerja($id)
    {
        $unitkerja = UnitKerja::findOrFail($id);
        $unitkerja->delete();

        session()->flash('message', 'Unit Kerja berhasil dihapus.');
        return redirect()->route('unitkerja.index');
    }

    public function render()
    {
        $unitkerjas = UnitKerja::when($this->search, fn($q) => $q->where('nama_unit', 'like', '%' . $this->search . '%'))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.unit-kerja.index', compact('unitkerjas'))
            ->layout('layouts.app', ['title' => 'Unit Kerja']);
    }
}
