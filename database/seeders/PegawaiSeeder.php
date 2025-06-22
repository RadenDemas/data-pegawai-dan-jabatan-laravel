<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run(): void
    {
        Pegawai::create([
            'nip' => '10001',
            'nama' => 'Ahmad Syahputra',
            'jabatan_id' => 1,
            'unit_kerja_id' => 1,
            'gaji' => 5000000
        ]);

        Pegawai::create([
            'nip' => '10002',
            'nama' => 'Dewi Kartika',
            'jabatan_id' => 2,
            'unit_kerja_id' => 2,
            'gaji' => 4000000
        ]);

        Pegawai::create([
            'nip' => '10003',
            'nama' => 'Budi Santoso',
            'jabatan_id' => 3,
            'unit_kerja_id' => 3,
            'gaji' => 3500000
        ]);
    }
}
