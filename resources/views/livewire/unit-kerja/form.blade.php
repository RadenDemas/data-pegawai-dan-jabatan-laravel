<div class="bg-gray-50 p-4 mb-4 rounded-sm shadow-sm">
    <input type="text" wire:model.defer="nama_unit" placeholder="Nama Unit" class="block mb-2 w-full border px-2 py-1 rounded-sm">
    <input type="text" wire:model.defer="lokasi" placeholder="Lokasi" class="block mb-2 w-full border px-2 py-1 rounded-sm">

    <button wire:click="store" class="px-4 py-2 bg-green-500 text-white rounded-sm">Simpan</button>
    <button wire:click="$set('isOpen', false)" class="px-4 py-2 bg-gray-300 rounded-sm">Batal</button>
</div>