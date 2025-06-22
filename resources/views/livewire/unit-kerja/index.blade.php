<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Unit Kerja</h1>
        <a href="{{ route('unitkerja.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</a>
    </div>

    <form wire:submit.prevent="$refresh" class="mb-4 flex gap-2">
        <input type="text" wire:model.defer="search" placeholder="Cari nama unit..." class="input input-bordered" />
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    @if (session()->has('message'))
        <div class="alert alert-success mb-4">{{ session('message') }}</div>
    @endif

    <table class="table table-zebra w-full text-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Unit</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unitkerjas as $unit)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $unit->nama_unit }}</td>
                    <td>{{ $unit->lokasi }}</td>
                    <td class="flex gap-2">
                        <a href="{{ route('unitkerja.edit', $unit->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <button wire:click="deleteunitkerja({{ $unit->id }})" class="btn btn-sm btn-error"
                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $unitkerjas->links() }}
    </div>
</div>