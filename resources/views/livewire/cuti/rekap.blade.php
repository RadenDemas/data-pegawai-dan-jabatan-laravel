<div>
    <h1 class="text-2xl font-bold mb-4">Rekap Cuti Pegawai Tahun {{ $tahun }}</h1>

    <div class="form-control w-48 mb-4">
        <label class="label">Pilih Tahun</label>
        <input type="number" wire:model="tahun" class="input input-bordered" min="2000" />
    </div>

    <table class="table table-zebra w-full text-sm">
        <thead>
        <tr>
            <th>#</th>
            <th>Nama Pegawai</th>
            <th>Total Cuti Diambil</th>
            <th>Sisa Cuti</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($daftarPegawai as $pegawai)
        @php
        $total = $pegawai->cuti->sum(fn($cuti) => $cuti->jumlah_hari);
        $sisa = 12 - $total;
        @endphp
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pegawai->nama }}</td>
            <td>{{ $total }} hari</td>
            <td>{{ $sisa }} hari</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
