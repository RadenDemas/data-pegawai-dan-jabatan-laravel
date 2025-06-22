<div class="bg-gray-50 p-4 rounded-sm shadow-sm mb-4">
    <input type="text" wire:model.defer="nama_jabatan" placeholder="Nama Jabatan" class="block mb-2 w-full border rounded-sm px-2 py-1">
    <input type="number" wire:model.defer="tunjangan" placeholder="Tunjangan" class="block mb-2 w-full border rounded-sm px-2 py-1">

    <button wire:click="store" class="px-4 py-2 bg-green-500 text-white rounded-sm">Simpan</button>
    <button wire:click="$set('isOpen', false)" class="px-4 py-2 bg-gray-300 rounded-sm">Batal</button>
</div>