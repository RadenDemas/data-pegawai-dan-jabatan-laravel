<div>
    <h1 class="text-2xl font-bold mb-4">Rekap Absensi Bulanan</h1>

    <div class="flex gap-4 mb-4">
        <div>
            <label>Bulan</label>
            <select wire:model="bulan" class="border px-2 py-1 rounded-sm">
                @for($i = 1; $i <= 12; $i++)
                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ $i }}</option>
                    @endfor
            </select>
        </div>
        <div>
            <label>Tahun</label>
            <select wire:model="tahun" class="border px-2 py-1 rounded-sm">
                @for($i = now()->year; $i >= 2020; $i--)
                <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>

    <table class="w-full border shadow-sm bg-white">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2">Nama</th>
                <th class="p-2">Hadir</th>
                <th class="p-2">Izin</th>
                <th class="p-2">Sakit</th>
                <th class="p-2">Cuti</th>
                <th class="p-2">Tidak Hadir</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rekap as $pegawai)
            @php
            $statusCounts = [
            'hadir' => 0,
            'izin' => 0,
            'sakit' => 0,
            'cuti' => 0,
            'tidak_hadir' => 0
            ];
            foreach ($pegawai->absensis as $absen) {
            $statusCounts[$absen->status] = ($statusCounts[$absen->status] ?? 0) + 1;
            }
            @endphp
            <tr class="border-t">
                <td class="p-2">{{ $pegawai->nama }}</td>
                <td class="p-2">{{ $statusCounts['hadir'] }}</td>
                <td class="p-2">{{ $statusCounts['izin'] }}</td>
                <td class="p-2">{{ $statusCounts['sakit'] }}</td>
                <td class="p-2">{{ $statusCounts['cuti'] }}</td>
                <td class="p-2">{{ $statusCounts['tidak_hadir'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>