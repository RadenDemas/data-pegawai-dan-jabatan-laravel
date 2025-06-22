<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Data Pegawai</h1>
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</a>
    </div>

    <form wire:submit.prevent="$refresh" class="mb-4 flex gap-2">
        <input type="text" wire:model.defer="search" placeholder="Cari nama pegawai..." class="input input-bordered" />
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    @if (session()->has('message'))
        <div class="alert alert-success mb-4">{{ session('message') }}</div>
    @endif

    <table class="table table-zebra w-full text-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Unit Kerja</th>
                <th>Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawais as $pegawai)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pegawai->nama }}</td>
                    <td>{{ $pegawai->jabatan->nama_jabatan ?? '-' }}</td>
                    <td>{{ $pegawai->unitKerja->nama_unit ?? '-' }}</td>
                    <td>Rp{{ number_format($pegawai->gaji, 0, ',', '.') }}</td>
                    <td class="flex gap-2">
                        <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <button wire:click="deletepegawai({{ $pegawai->id }})" class="btn btn-sm btn-error"
                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $pegawais->links() }}
    </div>
</div>
