<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatans';
    protected $fillable = ['nama_jabatan', 'tunjangan'];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
