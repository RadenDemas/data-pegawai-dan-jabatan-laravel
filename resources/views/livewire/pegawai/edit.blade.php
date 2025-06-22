<div class="max-w-lg mx-auto space-y-4">
    <h1 class="text-2xl font-bold mb-4">Edit Pegawai</h1>

    <div>
        <label class="block font-medium mb-1">NIP</label>
        <input type="text" wire:model.defer="nip" class="input input-bordered w-full" />
        @error('nip') <div class="text-error text-sm">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block font-medium mb-1">Nama</label>
        <input type="text" wire:model.defer="nama" class="input input-bordered w-full" />
        @error('nama') <div class="text-error text-sm">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block font-medium mb-1">Jabatan</label>
        <select wire:model.defer="jabatan_id" class="select select-bordered w-full">
            <option value="">-- Pilih Jabatan --</option>
            @foreach ($jabatans as $j)
                <option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option>
            @endforeach
        </select>
        @error('jabatan_id') <div class="text-error text-sm">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block font-medium mb-1">Unit Kerja</label>
        <select wire:model.defer="unit_kerja_id" class="select select-bordered w-full">
            <option value="">-- Pilih Unit Kerja --</option>
            @foreach ($unitKerjas as $u)
                <option value="{{ $u->id }}">{{ $u->nama_unit }}</option>
            @endforeach
        </select>
        @error('unit_kerja_id') <div class="text-error text-sm">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block font-medium mb-1">Gaji Pokok</label>
        <input type="number" wire:model.defer="gaji" class="input input-bordered w-full" />
        @error('gaji') <div class="text-error text-sm">{{ $message }}</div> @enderror
    </div>

    <div class="flex gap-2">
        <button wire:click="update" class="btn btn-primary"><i class="fa-solid fa-save"></i> Perbarui</button>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
    </div>
</div>
