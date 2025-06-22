<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    public function run(): void
    {
        Jabatan::create([
            'nama_jabatan' => 'Manager',
            'tunjangan' => 3000000
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Staff',
            'tunjangan' => 1500000
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Admin',
            'tunjangan' => 1000000
        ]);
    }
}
