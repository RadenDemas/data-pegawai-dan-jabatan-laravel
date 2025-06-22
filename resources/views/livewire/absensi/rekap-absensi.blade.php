<div>
    <h1 class="text-2xl font-bold mb-4">Rekap Absensi Bulanan</h1>

    <form wire:submit.prevent="$refresh" class="flex flex-wrap items-end gap-3 mb-4">
        <div>
            <label class="block text-sm mb-1">Bulan</label>
            <select wire:model.defer="bulan" class="select select-bordered">
                @foreach (range(1,12) as $bln)
                    <option value="{{ sprintf('%02d', $bln) }}">{{ \Carbon\Carbon::create()->month($bln)->translatedFormat('F') }}</option>
                @endforeach
            </select>
        </div>
    
        <div>
            <label class="block text-sm mb-1">Tahun</label>
            <input type="number" wire:model.defer="tahun" class="input input-bordered w-24" min="2020" max="2100" />
        </div>
    
        <div>
            <label class="block text-sm mb-1">Cari Nama</label>
            <input type="text" wire:model.defer="search" placeholder="Cari nama..." class="input input-bordered w-full" />
        </div>
    
        <div>
            <label class="block text-sm mb-1 invisible">Cari</label>
            <button type="submit" class="btn btn-primary w-full">Cari</button>
        </div>
    </form>
    

    <table class="table table-zebra w-full text-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pegawai</th>
                <th>Hadir</th>
                <th>Izin</th>
                <th>Sakit</th>
                <th>Tidak Hadir</th>
                <th>Cuti</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pegawais as $pegawai)
                @php $data = $rekap[$pegawai->id] ?? null; @endphp
                <tr>
                    <td>{{ $loop->iteration + ($pegawais->currentPage() - 1) * $pegawais->perPage() }}</td>
                    <td>{{ $pegawai->nama }}</td>
                    <td>{{ $data->hadir ?? 0 }}</td>
                    <td>{{ $data->izin ?? 0 }}</td>
                    <td>{{ $data->sakit ?? 0 }}</td>
                    <td>{{ $data->tidak_hadir ?? 0 }}</td>
                    <td>{{ $data->cuti ?? 0 }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $pegawais->links() }}
    </div>
</div>
