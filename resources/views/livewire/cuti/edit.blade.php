<div class="max-w-lg mx-auto space-y-4">
    <h1 class="text-2xl font-bold mb-4">Pengajuan Cuti</h1>

    <div>
        <label class="block font-medium mb-1">Pegawai</label>
        <select wire:model.defer="pegawai_id" class="select select-bordered w-full">
            <option value="">-- Pilih Pegawai --</option>
            @foreach ($pegawais as $p)
                <option value="{{ $p->id }}">{{ $p->nama }} ({{ $p->nip }})</option>
            @endforeach
        </select>
        @error('pegawai_id') <div class="text-error text-sm">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block font-medium mb-1">Tanggal Mulai</label>
        <input type="date" wire:model.defer="tanggal_mulai" class="input input-bordered w-full" />
        @error('tanggal_mulai') <div class="text-error text-sm">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block font-medium mb-1">Tanggal Akhir</label>
        <input type="date" wire:model.defer="tanggal_akhir" class="input input-bordered w-full" />
        @error('tanggal_akhir') <div class="text-error text-sm">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block font-medium mb-1">Alasan</label>
        <textarea wire:model.defer="alasan" class="textarea textarea-bordered w-full" rows="3"></textarea>
        @error('alasan') <div class="text-error text-sm">{{ $message }}</div> @enderror
    </div>

    <div class="flex gap-2">
        <button wire:click="simpan" class="btn btn-primary"><i class="fa-solid fa-save"></i> Ajukan Cuti</button>
        <a href="{{ route('cuti.index') }}" class="btn btn-secondary">Batal</a>
    </div>
</div>
