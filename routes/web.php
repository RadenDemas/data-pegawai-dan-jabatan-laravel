<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Jabatan\Index as JabatanIndex;
use App\Livewire\Jabatan\Create as JabatanCreate;
use App\Livewire\Jabatan\Edit as JabatanEdit;
use App\Livewire\UnitKerja\Index as UnitKerjaIndex;
use App\Livewire\UnitKerja\Create as UnitKerjaCreate;
use App\Livewire\UnitKerja\Edit as UnitKerjaEdit;
use App\Livewire\Pegawai\Index as PegawaiIndex;
use App\Livewire\Pegawai\Create as PegawaiCreate;
use App\Livewire\Pegawai\Edit as PegawaiEdit;
use App\Livewire\Cuti\Index as CutiIndex;
use App\Livewire\Cuti\Create as CutiCreate;
use App\Livewire\Cuti\Edit as CutiEdit;
use App\Livewire\Cuti\Rekap as CutiRekap;
use App\Livewire\Absensi\Index as AbsensiIndex;
use App\Livewire\Absensi\Create as AbsensiCreate;
use App\Livewire\Absensi\Edit as AbsensiEdit;
use App\Livewire\Absensi\RekapAbsensi;
use App\Livewire\Dashboard;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::middleware('auth')->group(function () {
    Route::get('/jabatan', JabatanIndex::class)->name('jabatan.index');
    Route::get('/jabatan/create', JabatanCreate::class)->name('jabatan.create');
    Route::get('/jabatan/{jabatan}/edit', JabatanEdit::class)->name('jabatan.edit');
});


Route::middleware('auth')->group(function () {
    Route::get('/unit-kerja', UnitKerjaIndex::class)->name('unitkerja.index');
    Route::get('/unit-kerja/create', UnitKerjaCreate::class)->name('unitkerja.create');
    Route::get('/unit-kerja/{unitKerja}/edit', UnitKerjaEdit::class)->name('unitkerja.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/pegawai', PegawaiIndex::class)->name('pegawai.index');
    Route::get('/pegawai/create', PegawaiCreate::class)->name('pegawai.create');
    Route::get('/pegawai/{pegawai}/edit', PegawaiEdit::class)->name('pegawai.edit');
});


Route::middleware('auth')->group(function () {
    Route::get('/cuti', CutiIndex::class)->name('cuti.index');
    Route::get('/cuti/create', CutiCreate::class)->name('cuti.create');
    Route::get('/cuti/{id}/edit', CutiEdit::class)->name('cuti.edit');
    Route::get('/cuti/rekap', CutiRekap::class)->name('cuti.rekap');
});



Route::middleware('auth')->group(function () {
    Route::get('/absensi', AbsensiIndex::class)->name('absensi.index');
    Route::get('/absensi/create', AbsensiCreate::class)->name('absensi.create');
    Route::get('/absensi/{absensi}/edit', AbsensiEdit::class)->name('absensi.edit');
    Route::get('/absensi/today', AbsensiIndex::class)->name('absensi.today');
    Route::get('/absensi/rekap', RekapAbsensi::class)->name('absensi.rekap');
});


require __DIR__ . '/auth.php';
