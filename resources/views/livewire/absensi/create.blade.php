<div>
    <h1 class="text-2xl font-bold mb-4">Absensi Hari Ini ({{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }})</h1>

    <form wire:submit.prevent="simpan" class="space-y-4">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>Nama Pegawai</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataAbsensi as $index => $absensi)
                    <tr>
                        <td>{{ $absensi['nama'] }}</td>
                        <td>
                            @if ($absensi['isCuti'])
                                <div class="badge badge-neutral">Cuti</div>
                                <input type="hidden" wire:model="dataAbsensi.{{ $index }}.status" value="cuti" />
                            @else
                                <div class="flex flex-wrap gap-2">
                                    @foreach (['hadir', 'sakit', 'izin', 'tidak_hadir'] as $status)
                                        <label
                                            wire:click="$set('dataAbsensi.{{ $index }}.status', '{{ $status }}')"
                                            class="cursor-pointer px-3 py-1 rounded-md border
                                                {{ $absensi['status'] === $status ? 'bg-primary text-white border-primary' : 'bg-base-200 text-gray-700 border-base-300 hover:bg-base-300' }}">
                                            {{ ucfirst(str_replace('_', ' ', $status)) }}
                                        </label>
                                    @endforeach
                                </div>
                            @endif
                        </td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan Absensi</button>
    </form>
</div>
