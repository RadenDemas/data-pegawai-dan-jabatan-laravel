<div>
    <h1 class="text-2xl font-bold mb-4">Gaji Pegawai</h1>
    <form wire:submit.prevent="$refresh" class="mb-4 flex gap-2">
        <input
            type="text"
            wire:model.defer="search"
            placeholder="Cari nama..."
            class="input input-bordered"
        />
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>
    

    <table class="table table-zebra w-full text-sm">
        <thead>
            <tr>
                <th>Nama Pegawai</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pegawais as $pegawai)
                <tr>
                    <td>{{ $pegawai->nama }}</td>
                    <td>Rp {{ number_format($pegawai->gaji, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format(optional($pegawai->jabatan)->tunjangan ?? 0, 0, ',', '.') }}</td>
                    <td>
                        Rp {{ number_format($pegawai->gaji + (optional($pegawai->jabatan)->tunjangan ?? 0), 0, ',', '.') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data pegawai</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $pegawais->links() }}
    </div>
</div>
