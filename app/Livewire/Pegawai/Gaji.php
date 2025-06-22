<?php

namespace App\Livewire\Pegawai;

use Livewire\Component;
use App\Models\Pegawai;
use Livewire\WithPagination;

class Gaji extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function render()
    {
        $pegawais = Pegawai::with('jabatan')
            ->where('nama', 'like', '%' . $this->search . '%')
            ->orderBy('nama')
            ->paginate(10);

        return view('livewire.pegawai.gaji', compact('pegawais'))
            ->layout('layouts.app', ['title' => 'Gaji Pegawai']);
    }
}
