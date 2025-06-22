{{-- resources/views/livewire/unitkerja/create.blade.php --}}
<div class="max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Tambah Unit Kerja</h1>

    <div class="space-y-4">
        <div>
            <label class="block font-medium mb-1">Nama Unit</label>
            <input type="text" wire:model.defer="nama_unit" class="input input-bordered w-full" />
            @error('nama_unit') <div class="text-error text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Lokasi</label>
            <input type="text" wire:model.defer="lokasi" class="input input-bordered w-full" />
            @error('lokasi') <div class="text-error text-sm">{{ $message }}</div> @enderror
        </div>

        <div class="flex gap-2">
            <button wire:click="simpan" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
            <a href="{{ route('unitkerja.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</div>
