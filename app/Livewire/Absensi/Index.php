<?php

namespace App\Livewire\Absensi;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Index extends Component
{
    public $tanggal;
    public $pegawais = [];

    public function mount()
    {
        $this->tanggal = Carbon::now()->toDateString();
        $this->cari(); // tampilkan hari ini saat pertama kali
    }

    public function cari()
    {
        $this->pegawais = DB::table('pegawais')
            ->leftJoin('absensis', function ($join) {
                $join->on('pegawais.id', '=', 'absensis.pegawai_id')
                    ->where('absensis.tanggal', '=', $this->tanggal);
            })
            ->select('pegawais.id', 'pegawais.nama', 'absensis.status as absensi_status')
            ->orderBy('pegawais.nama')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.absensi.index')->layout('layouts.app', ['title' => 'Rekap Absensi']);
    }
}
