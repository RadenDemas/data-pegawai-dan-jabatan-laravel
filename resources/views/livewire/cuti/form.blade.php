<div class="bg-gray-50 p-4 mb-4 rounded-sm shadow-sm">
    <select wire:model.defer="pegawai_id" class="w-full mb-2 border px-2 py-1 rounded-sm">
        <option value="">-- Pilih Pegawai --</option>
        @foreach($pegawais as $p)
        <option value="{{ $p->id }}">{{ $p->nama }}</option>
        @endforeach
    </select>

    <input type="date" wire:model.defer="tanggal_mulai" class="w-full mb-2 border px-2 py-1 rounded-sm">
    <input type="date" wire:model.defer="tanggal_akhir" class="w-full mb-2 border px-2 py-1 rounded-sm">
    <textarea wire:model.defer="alasan" placeholder="Alasan cuti" class="w-full mb-2 border px-2 py-1 rounded-sm"></textarea>

    <button wire:click="store" class="px-4 py-2 bg-green-500 text-white rounded-sm">Ajukan</button>
    <button wire:click="$set('isOpen', false)" class="px-4 py-2 bg-gray-300 rounded-sm">Batal</button>
</div>