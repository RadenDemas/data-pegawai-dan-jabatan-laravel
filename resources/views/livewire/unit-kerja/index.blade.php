{{-- resources/views/livewire/unitkerja/index.blade.php --}}
<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Unit Kerja</h1>
        <a href="{{ route('unitkerja.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</a>
    </div>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <table class="table table-zebra w-full">
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
                    <a href="{{ route('unitkerja.edit', $unit) }}" class="btn btn-warning btn-xs"><i class="fa-solid fa-pen"></i> Edit</a>
                    <button wire:click="deleteunitkerja({{ $unit->id }})" class="btn btn-error btn-xs"><i class="fa-solid fa-trash"></i> Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>