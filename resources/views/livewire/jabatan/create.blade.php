{{-- resources/views/livewire/jabatan/create.blade.php --}}
<div class="max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Tambah Jabatan</h1>

    <div class="space-y-4">
        <div>
            <label class="block font-medium mb-1">Nama Jabatan</label>
            <input type="text" wire:model.defer="nama_jabatan" class="input input-bordered w-full" />
            @error('nama_jabatan') <div class="text-error text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Tunjangan</label>
            <input type="number" wire:model.defer="tunjangan" class="input input-bordered w-full" />
            @error('tunjangan') <div class="text-error text-sm">{{ $message }}</div> @enderror
        </div>

        <div class="flex gap-2">
            <button wire:click="simpan" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
            <a href="{{ route('jabatan.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</div>
