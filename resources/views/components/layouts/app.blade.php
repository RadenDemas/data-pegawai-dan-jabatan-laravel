<!-- resources/views/components/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-900">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg">
            <div class="p-4 font-bold text-xl border-b">Data Pegawai</div>
            <nav class="p-4 space-y-2">
                <a href="/dashboard" class="block px-3 py-2 rounded-sm hover:bg-gray-200">Dashboard</a>
                <a href="/pegawai" class="block px-3 py-2 rounded-sm hover:bg-gray-200">Pegawai</a>
                <a href="/jabatan" class="block px-3 py-2 rounded-sm hover:bg-gray-200">Jabatan</a>
                <a href="/unit-kerja" class="block px-3 py-2 rounded-sm hover:bg-gray-200">Unit Kerja</a>
                <a href="/absensi" class="block px-3 py-2 rounded-sm hover:bg-gray-200">Absensi</a>
                <a href="/cuti" class="block px-3 py-2 rounded-sm hover:bg-gray-200">Pengajuan Cuti</a>
                <a href="/laporan" class="block px-3 py-2 rounded-sm hover:bg-gray-200">Laporan Absensi</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
</body>

</html>