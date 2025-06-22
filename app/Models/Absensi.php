<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensis';
    protected $fillable = ['pegawai_id', 'tanggal', 'status'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
