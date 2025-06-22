<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Cuti</h1>
        <a href="{{ route('cuti.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Ajukan Cuti</a>
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
        @foreach ($cutis as $cuti)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cuti->pegawai->nama }}</td>
                <td>
                    {{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->translatedFormat('d F Y') }}
                    -
                    {{ \Carbon\Carbon::parse($cuti->tanggal_akhir)->translatedFormat('d F Y') }}
                </td>
                <td>{{ $cuti->jumlah_hari }} hari</td>
                <td>{{ $cuti->alasan }}</td>
                <td>
                    <div class="flex gap-2">
                    <a href="{{ route('cuti.edit', $cuti->id) }}" class="btn btn-sm btn-primary">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </a>
                    <form wire:submit.prevent="hapus({{ $cuti->id }})" class="inline">
                        <button type="submit" class="btn btn-error btn-sm">
                            <i class="fa-solid fa-trash"></i> Hapus
                        </button>
                    </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
