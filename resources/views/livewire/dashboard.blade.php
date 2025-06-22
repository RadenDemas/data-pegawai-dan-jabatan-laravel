<div>
    <h1 class="text-3xl font-bold mb-4">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white p-4 rounded-xl shadow flex items-center gap-4">
            <div class="bg-blue-100 p-2 rounded-full">
                <i class="fa-solid fa-users text-blue-500 text-lg"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Pegawai</p>
                <h2 class="text-xl font-bold">{{ $pegawai }}</h2>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow flex items-center gap-4">
            <div class="bg-green-100 p-2 rounded-full">
                <i class="fa-solid fa-briefcase text-green-500 text-lg"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Jabatan</p>
                <h2 class="text-xl font-bold">{{ $jabatan }}</h2>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow flex items-center gap-4">
            <div class="bg-yellow-100 p-2 rounded-full">
                <i class="fa-solid fa-building text-yellow-500 text-lg"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Unit Kerja</p>
                <h2 class="text-xl font-bold">{{ $unitKerja }}</h2>
            </div>
        </div>

    </div>

    <h2 class="text-2xl font-semibold mb-4">Status Kehadiran Hari Ini ({{ \Carbon\Carbon::now()->translatedFormat('d F Y') }})</h2>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 text-center">

        <div class="bg-green-100 rounded-xl p-4 shadow">
            <p class="text-sm text-gray-500">Hadir</p>
            <h3 class="text-2xl font-bold text-green-700">{{ $hadir }}</h3>
        </div>

        <div class="bg-blue-100 rounded-xl p-4 shadow">
            <p class="text-sm text-gray-500">Izin</p>
            <h3 class="text-2xl font-bold text-blue-700">{{ $izin }}</h3>
        </div>

        <div class="bg-yellow-100 rounded-xl p-4 shadow">
            <p class="text-sm text-gray-500">Sakit</p>
            <h3 class="text-2xl font-bold text-yellow-700">{{ $sakit }}</h3>
        </div>

        <div class="bg-red-100 rounded-xl p-4 shadow">
            <p class="text-sm text-gray-500">Tidak Hadir</p>
            <h3 class="text-2xl font-bold text-red-700">{{ $tidak_hadir }}</h3>
        </div>

        <div class="bg-neutral-200 rounded-xl p-4 shadow">
            <p class="text-sm text-gray-500">Cuti</p>
            <h3 class="text-2xl font-bold text-gray-700">{{ $cuti }}</h3>
        </div>

    </div>
</div>
