<div class="max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Absensi</h1>

    <div class="space-y-4">
        <div>
            <label class="block font-medium mb-1">Pegawai</label>
            <input type="text" value="{{ $pegawai->nama }}" class="input input-bordered w-full bg-gray-100" readonly />
        </div>

        <div>
            <label class="block font-medium mb-1">Tanggal</label>
            <input type="date" wire:model="tanggal" class="input input-bordered w-full" />
            @error('tanggal') <div class="text-error text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Status</label>
            <select wire:model="status" class="select select-bordered w-full {{ $isCuti ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : '' }}" {{ $isCuti ? 'disabled' : '' }}>
                <option value="">Pilih Status</option>
                <option value="hadir">Hadir</option>
                <option value="sakit">Sakit</option>
                <option value="izin">Izin</option>
                <option value="tidak_hadir">Tidak Hadir</option>
            </select>
            @if ($isCuti)
                <div class="text-sm text-gray-500 mt-1">Pegawai sedang <strong>cuti</strong> pada tanggal ini.</div>
            @endif
            @error('status') <div class="text-error text-sm">{{ $message }}</div> @enderror
        </div>

        <div class="flex gap-2">
            <button wire:click="update" class="btn btn-primary"><i class="fa-solid fa-save"></i> Perbarui</button>
            <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</div>
