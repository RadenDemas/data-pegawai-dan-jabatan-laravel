<div class="bg-gray-50 p-4 rounded-sm shadow-sm mb-4">
    <input type="text" wire:model.defer="nip" placeholder="NIP" class="block mb-2 w-full border rounded-sm px-2 py-1">
    <input type="text" wire:model.defer="nama" placeholder="Nama Pegawai" class="block mb-2 w-full border rounded-sm px-2 py-1">

    <select wire:model.defer="jabatan_id" class="block mb-2 w-full border rounded-sm px-2 py-1">
        <option value="">Pilih Jabatan</option>
        @foreach($jabatans as $jabatan)
        <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
        @endforeach
    </select>

    <select wire:model.defer="unit_kerja_id" class="block mb-2 w-full border rounded-sm px-2 py-1">
        <option value="">Pilih Unit Kerja</option>
        @foreach($unitKerjas as $unit)
        <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
        @endforeach
    </select>

    <input type="number" wire:model.defer="gaji" placeholder="Gaji Pokok" class="block mb-2 w-full border rounded-sm px-2 py-1">

    <button wire:click="store" class="px-4 py-2 bg-green-500 text-white rounded-sm">Simpan</button>
    <button wire:click="$set('isOpen', false)" class="px-4 py-2 bg-gray-300 rounded-sm">Batal</button>
</div>