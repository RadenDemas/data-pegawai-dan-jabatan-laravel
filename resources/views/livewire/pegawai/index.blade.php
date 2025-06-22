{{-- resources/views/livewire/pegawai/index.blade.php --}}
<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Data Pegawai</h1>
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</a>
    </div>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <table class="table table-zebra w-full text-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Unit Kerja</th>
                <th>Gaji Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawais as $pegawai)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pegawai->nip }}</td>
                <td>{{ $pegawai->nama }}</td>
                <td>{{ $pegawai->jabatan->nama_jabatan }}</td>
                <td>{{ $pegawai->unitKerja->nama_unit }}</td>
                <td>Rp {{ number_format($pegawai->gaji, 0, ',', '.') }}</td>
                <td class="flex gap-2">
                    <a href="{{ route('pegawai.edit', $pegawai) }}" class="btn btn-warning btn-xs"><i class="fa-solid fa-pen"></i> Edit</a>
                    <button wire:click="deletepegawai({{ $pegawai->id }})" class="btn btn-error btn-xs"><i class="fa-solid fa-trash"></i> Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>