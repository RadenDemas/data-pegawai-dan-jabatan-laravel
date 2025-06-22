<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-base-100 text-gray-900">

<div class="drawer lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col">

        <!-- Sticky Navbar -->
        <div class="top-0 z-50 w-full navbar bg-base-200 border-b px-6 shadow-sm">
            <div class="flex-none lg:hidden">
                <label for="my-drawer-2" class="btn btn-ghost btn-square text-lg">
                    <i class="fa-solid fa-bars"></i>
                </label>
            </div>
            <div class="flex-1 px-2 text-2xl font-semibold">Data Pegawai & Pejabat</div>
        </div>

        <!-- Page content here -->
        <main class="p-6 bg-base-100">
            {{ $slot }}
        </main>
    </div>

    <!-- Sidebar -->
    <div class="drawer-side">
        <label for="my-drawer-2" class="drawer-overlay"></label>
        <aside class="w-64 min-h-screen bg-base-200 border-r shadow-md">

            <div class="px-6 py-4 text-3xl font-bold border-b mb-4">Menu</div>

            <ul class="text-lg space-y-2 px-3 text-gray-800">
                <li>
                    <a href="{{route('dashboard')}}" @class([
               'flex items-center gap-3 py-2 px-3 rounded-md transition',
               'bg-base-300 font-semibold text-primary' => request()->routeIs('dashboard'),
               'hover:bg-base-200' => !request()->routeIs('dashboard')
                ])>
                        <i class="fa-solid fa-house"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('pegawai.index') }}" @class([
    'flex items-center gap-3 py-2 px-3 rounded-md transition',
    'bg-base-300 font-semibold text-primary' => request()->routeIs('pegawai.*'),
    'hover:bg-base-200' => !request()->routeIs('pegawai.*')
])>
                        <i class="fa-solid fa-users"></i> Pegawai
                    </a>
                </li>
                <li>
                    <a href="{{route('jabatan.index')}}" @class([
               'flex items-center gap-3 py-2 px-3 rounded-md transition',
               'bg-base-300 font-semibold text-primary' => request()->routeIs('jabatan.*'),
               'hover:bg-base-200' => !request()->routeIs('jabatan.*')
                ])>
                        <i class="fa-solid fa-briefcase"></i> Jabatan
                    </a>
                </li>
                <li>
                    <a href="{{ route('unitkerja.index') }}" @class([
    'flex items-center gap-3 py-2 px-3 rounded-md transition',
    'bg-base-300 font-semibold text-primary' => request()->routeIs('unitkerja.*'),
    'hover:bg-base-200' => !request()->routeIs('unitkerja.*')
])>
                        <i class="fa-solid fa-building"></i> Unit Kerja
                    </a>

                </li>
                <li>
                    <a href="{{ route('absensi.create') }}" @class([
    'flex items-center gap-3 py-2 px-3 rounded-md transition',
    'bg-base-300 font-semibold text-primary' => request()->routeIs('absensi.create'),
    'hover:bg-base-200' => !request()->routeIs('absensi.create')
])>
                        <i class="fa-solid fa-calendar-check"></i> Isi Absensi
                    </a>
                </li>
                <li>
                    <a href="{{ route('absensi.index') }}" @class([
    'flex items-center gap-3 py-2 px-3 rounded-md transition',
    'bg-base-300 font-semibold text-primary' => request()->routeIs('absensi.index'),
    'hover:bg-base-200' => !request()->routeIs('absensi.index')
])>
                        <i class="fa-solid fa-calendar-check"></i> Cek Absensi
                    </a>
                </li>
                <li>
                    <a href="{{ route('absensi.rekap') }}" @class([
    'flex items-center gap-3 py-2 px-3 rounded-md transition',
    'bg-base-300 font-semibold text-primary' => request()->routeIs('absensi.rekap'),
    'hover:bg-base-200' => !request()->routeIs('absensi.rekap')
])>
                        <i class="fa-solid fa-calendar-check"></i> Rekap Absensi
                    </a>
                </li>
                <li>
                    <a href="{{ route('cuti.index') }}" @class([
    'flex items-center gap-3 py-2 px-3 rounded-md transition',
    'bg-base-300 font-semibold text-primary' => request()->routeIs('cuti.*'),
    'hover:bg-base-200' => !request()->routeIs('cuti*')
])>
                        <i class="fa-solid fa-pen-to-square"></i> Pengajuan Cuti
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('cuti.rekap') }}" @class([
    'flex items-center gap-3 py-2 px-3 rounded-md transition',
    'bg-base-300 font-semibold text-primary' => request()->routeIs('cuti.rekap'),
    'hover:bg-base-200' => !request()->routeIs('cuti.rekap')
])>
                        <i class="fa-solid fa-pen-to-square"></i> Rekap Cuti
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-3 py-2 px-3 rounded-md hover:bg-base-300 transition">
                        <i class="fa-solid fa-chart-line"></i> Laporan Absensi
                    </a>
                </li> --}}
                <li>
                    <form method="POST" action="" class="w-full flex items-center gap-3 py-2 px-3 rounded-md hover:bg-red-100 transition text-red-600">
                        @csrf
                        <button >
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>

        </aside>
    </div>
</div>

@livewireScripts
</body>
</html>
