<?php

namespace App\Livewire\Absensi;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Index extends Component
{
    use WithPagination;

    public $tanggal;
    public $search;

    protected $queryString = ['tanggal', 'search'];

    public function mount()
    {
        $this->tanggal = $this->tanggal ?? Carbon::now()->toDateString();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingTanggal()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = DB::table('pegawais')
            ->leftJoin('absensis', function ($join) {
                $join->on('pegawais.id', '=', 'absensis.pegawai_id')
                    ->where('absensis.tanggal', '=', $this->tanggal);
            })
            ->select('pegawais.id', 'pegawais.nama', 'absensis.status as absensi_status');

        if ($this->search) {
            $query->where('pegawais.nama', 'like', '%' . $this->search . '%');
        }

        $pegawais = $query->orderBy('pegawais.nama')->paginate(10);

        return view('livewire.absensi.index', compact('pegawais'))
            ->layout('layouts.app', ['title' => 'Rekap Absensi']);
    }
}
