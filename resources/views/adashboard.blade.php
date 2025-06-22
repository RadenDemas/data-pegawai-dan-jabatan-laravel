<x-app-layout title="Dashboard">
    <h1 class="text-3xl font-bold mb-4">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white p-4 rounded-xl shadow flex items-center gap-4">
            <div class="bg-blue-100 p-2 rounded-full">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A12.01 12.01 0 0112 3c3.03 0 5.786 1.14 7.879 3M12 3v10"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Pegawai</p>
                <h2 class="text-xl font-bold">123</h2>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow flex items-center gap-4">
            <div class="bg-green-100 p-2 rounded-full">
                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5V8H2v12h5"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Jabatan</p>
                <h2 class="text-xl font-bold">8</h2>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow flex items-center gap-4">
            <div class="bg-yellow-100 p-2 rounded-full">
                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Unit Kerja</p>
                <h2 class="text-xl font-bold">5</h2>
            </div>
        </div>

    </div>
</x-app-layout>
