<div>
    <div class="flex flex-wrap items-end gap-3 mb-4">
        <div >
            <label class="block text-sm mb-1">Cari Pegawai</label>
            <form wire:submit.prevent="$refresh" class="flex gap-2">
                <input type="text" wire:model.defer="search" class="input input-bordered w-full" placeholder="Cari nama pegawai..." />
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>

    <table class="table table-zebra w-full text-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Pegawai</th>
                <th>Tanggal</th>
                <th>Jumlah Hari</th>
                <th>Alasan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cutis as $cuti)
                <tr>
                    <td>{{ $loop->iteration + ($cutis->currentPage() - 1) * $cutis->perPage() }}</td>
                    <td>{{ $cuti->pegawai->nama }}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->translatedFormat('d F Y') }}
                        -
                        {{ \Carbon\Carbon::parse($cuti->tanggal_akhir)->translatedFormat('d F Y') }}
                    </td>
                    <td>{{ $cuti->jumlah_hari }} hari</td>
                    <td>{{ $cuti->alasan }}</td>
                    <td>
                        <a href="{{ route('cuti.edit', $cuti->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <button wire:click="hapus({{ $cuti->id }})" class="btn btn-sm btn-error">Hapus</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Data cuti tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $cutis->links() }}
    </div>
</div>