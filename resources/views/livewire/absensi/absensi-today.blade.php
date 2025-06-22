<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Rekap Absensi</h1>
        <input type="date" wire:model="tanggal" class="input input-bordered" />
    </div>

    <table class="table table-zebra w-full">
        <thead>
            <tr>
                <th>Nama Pegawai</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawais as $pegawai)
                <tr>
                    <td>{{ $pegawai->nama }}</td>
                    <td>
                        @php
                            $absensi = $pegawai->absensis->first();
                        @endphp
                        @if ($absensi)
                            <span class="badge capitalize {{ 
                                $absensi->status == 'hadir' ? 'badge-success' :
                                ($absensi->status == 'cuti' ? 'badge-neutral' :
                                ($absensi->status == 'izin' ? 'badge-info' :
                                ($absensi->status == 'sakit' ? 'badge-warning' : 'badge-error')))
                            }}">{{ str_replace('_', ' ', $absensi->status) }}</span>
                        @else
                            <span class="badge badge-outline">Belum Diisi</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
