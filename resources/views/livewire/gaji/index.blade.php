<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Gaji Pegawai</h1>

    <table class="w-full table-auto border border-gray-300 shadow-xs bg-white">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 border">Nama</th>
                <th class="p-2 border">NIP</th>
                <th class="p-2 border">Jabatan</th>
                <th class="p-2 border">Gaji Pokok</th>
                <th class="p-2 border">Tunjangan</th>
                <th class="p-2 border">Total Gaji</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pegawais as $pegawai)
            <tr class="border-t">
                <td class="p-2 border">{{ $pegawai->nama }}</td>
                <td class="p-2 border">{{ $pegawai->nip }}</td>
                <td class="p-2 border">{{ $pegawai->jabatan->nama_jabatan ?? '-' }}</td>
                <td class="p-2 border">Rp{{ number_format($pegawai->gaji, 0, ',', '.') }}</td>
                <td class="p-2 border">Rp{{ number_format($pegawai->jabatan->tunjangan ?? 0, 0, ',', '.') }}</td>
                <td class="p-2 border font-semibold text-green-700">
                    Rp{{ number_format($pegawai->gaji + ($pegawai->jabatan->tunjangan ?? 0), 0, ',', '.') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>