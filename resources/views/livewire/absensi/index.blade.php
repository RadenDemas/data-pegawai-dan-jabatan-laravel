<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Rekap Absensi</h1>
        <div class="flex gap-2">
            <input type="date" wire:model="tanggal" class="input input-bordered" />
            <button wire:click="cari" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
        </div>
    </div>

    <table class="table table-zebra w-full">
        <thead>
            <tr>
                <th>Nama Pegawai</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pegawais as $pegawai)
                <tr>
                    <td>{{ $pegawai->nama }}</td>
                    <td>
                        @if ($pegawai->absensi_status)
                            <span class="badge capitalize {{ 
                                $pegawai->absensi_status == 'hadir' ? 'badge-success' :
                                ($pegawai->absensi_status == 'cuti' ? 'badge-neutral' :
                                ($pegawai->absensi_status == 'izin' ? 'badge-info' :
                                ($pegawai->absensi_status == 'sakit' ? 'badge-warning' : 'badge-error')))
                            }}">{{ str_replace('_', ' ', $pegawai->absensi_status) }}</span>
                        @else
                            <span class="badge badge-outline">Belum Diisi</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center text-gray-500">Tidak ada data pegawai.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
