<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Jabatan</h1>
        <a href="{{ route('jabatan.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</a>
    </div>

    <form wire:submit.prevent="$refresh" class="mb-4 flex gap-2">
        <input type="text" wire:model.defer="search" placeholder="Cari nama jabatan..." class="input input-bordered" />
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    @if (session()->has('message'))
        <div class="alert alert-success mb-4">{{ session('message') }}</div>
    @endif

    <table class="table table-zebra w-full text-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Jabatan</th>
                <th>Tunjangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jabatans as $jabatan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jabatan->nama_jabatan }}</td>
                    <td>Rp{{ number_format($jabatan->tunjangan, 0, ',', '.') }}</td>
                    <td class="flex gap-2">
                        <a href="{{ route('jabatan.edit', $jabatan->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <button wire:click="deletejabatan({{ $jabatan->id }})" class="btn btn-sm btn-error"
                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $jabatans->links() }}
    </div>
</div>
