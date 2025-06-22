{{-- resources/views/livewire/jabatan/index.blade.php --}}
<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Jabatan</h1>
        <a href="{{ route('jabatan.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</a>
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
                <td>Rp {{ number_format($jabatan->tunjangan, 0, ',', '.') }}</td>
                <td class="flex gap-2">
                    <a href="{{ route('jabatan.edit', $jabatan) }}" class="btn btn-warning btn-xs"><i class="fa-solid fa-pen"></i> Edit</a>
                    <button wire:click="deletejabatan({{ $jabatan->id }})" class="btn btn-error btn-xs"><i class="fa-solid fa-trash"></i> Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>