<?php

namespace Database\Seeders;

use App\Models\UnitKerja;
use Illuminate\Database\Seeder;

class UnitKerjaSeeder extends Seeder
{
    public function run(): void
    {
        UnitKerja::create([
            'nama_unit' => 'IT Support',
            'lokasi' => 'Jakarta'
        ]);

        UnitKerja::create([
            'nama_unit' => 'Finance',
            'lokasi' => 'Bandung'
        ]);

        UnitKerja::create([
            'nama_unit' => 'HRD',
            'lokasi' => 'Surabaya'
        ]);
    }
}
