<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitKerja extends Model
{
    use HasFactory;
    protected $table = 'unit_kerjas';
    protected $fillable = ['nama_unit', 'lokasi'];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
