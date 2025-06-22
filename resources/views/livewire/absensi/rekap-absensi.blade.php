<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Rekap Absensi Bulanan</h1>
        <div class="flex gap-2">
            <select wire:model="bulan" class="select select-bordered">
                @foreach (range(1, 12) as $m)
                    <option value="{{ $m }}">{{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}</option>
                @endforeach
            </select>
            <select wire:model="tahun" class="select select-bordered">
                @for ($y = now()->year - 5; $y <= now()->year + 2; $y++)
                    <option value="{{ $y }}">{{ $y }}</option>
                @endfor
            </select>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="table table-zebra w-full text-sm">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Hadir</th>
                    <th>Izin</th>
                    <th>Sakit</th>
                    <th>Tidak Hadir</th>
                    <th>Cuti</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rekap as $data)
                    <tr>
                        <td>{{ $data['nama'] }}</td>
                        <td>{{ $data['hadir'] }}</td>
                        <td>{{ $data['izin'] }}</td>
                        <td>{{ $data['sakit'] }}</td>
                        <td>{{ $data['tidak_hadir'] }}</td>
                        <td>{{ $data['cuti'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
