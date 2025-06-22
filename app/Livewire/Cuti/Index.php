<?php

namespace App\Livewire\Cuti;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cuti;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $queryString = ['search', 'page'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function hapus($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->delete();

        session()->flash('message', 'Pengajuan cuti berhasil dihapus.');
    }

    public function render()
    {
        $cutis = Cuti::with('pegawai')
            ->whereHas('pegawai', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->orderBy('tanggal_mulai', 'desc')
            ->paginate($this->perPage);

        return view('livewire.cuti.index', compact('cutis'))
            ->layout('layouts.app', ['title' => 'Daftar Cuti']);
    }
}
