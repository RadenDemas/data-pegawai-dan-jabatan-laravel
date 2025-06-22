<div>
    <h1 class="text-2xl font-bold mb-4">Rekap Absensi</h1>

    <form wire:submit.prevent="$refresh" class="mb-4 flex flex-wrap gap-2 items-end">
        <div>
            <label class="block text-sm mb-1">Tanggal</label>
            <input type="date" wire:model.defer="tanggal" class="input input-bordered" />
        </div>

        <div>
            <label class="block text-sm mb-1 ">Cari Nama</label>
            <input type="text" wire:model.defer="search" placeholder="Cari nama..." class="input input-bordered" />
        </div>

        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <table class="table table-zebra w-full text-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pegawai</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pegawais as $pegawai)
                <tr>
                    <td>{{ $loop->iteration + ($pegawais->currentPage() - 1) * $pegawais->perPage() }}</td>
                    <td>{{ $pegawai->nama }}</td>
                    <td>
                        @if ($pegawai->absensi_status)
                            <span class="badge capitalize
                                {{ $pegawai->absensi_status == 'hadir' ? 'badge-success' :
                                   ($pegawai->absensi_status == 'cuti' ? 'badge-neutral' :
                                   ($pegawai->absensi_status == 'izin' ? 'badge-info' :
                                   ($pegawai->absensi_status == 'sakit' ? 'badge-warning' : 'badge-error')))
                                }}">
                                {{ str_replace('_', ' ', $pegawai->absensi_status) }}
                            </span>
                        @else
                            <span class="badge badge-outline">Belum Diisi</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $pegawais->links() }}
    </div>
</div>
