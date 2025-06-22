<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'jabatan_id',
        'unit_kerja_id',
        'gaji',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class);
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }

    public function cuti()
    {
        return $this->hasMany(Cuti::class);
    }
}
