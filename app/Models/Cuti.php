<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cuti extends Model
{
    use HasFactory;
    protected $table = 'cutis';

    protected $fillable = ['pegawai_id', 'tanggal_mulai', 'tanggal_akhir', 'alasan'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function getJumlahHariAttribute()
    {
        return now()->parse($this->tanggal_mulai)->diffInDays(now()->parse($this->tanggal_akhir)) + 1;
    }
}
