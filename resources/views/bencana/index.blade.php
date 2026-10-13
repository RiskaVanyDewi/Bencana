<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identifikasi Kejadian Bencana</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-emerald-50 px-4 py-10">
<div class="mx-auto w-full max-w-6xl space-y-8">

    {{-- TOP HEADER (tanpa gradasi) --}}
    <div class="rounded-2xl border border-emerald-100 bg-white shadow-sm">
        <div class="flex flex-col gap-5 px-6 py-6 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-start gap-4">
                {{-- Badge/Icon Container --}}
                <div class="grid h-12 w-12 place-items-center rounded-xl bg-emerald-100 text-emerald-800 ring-1 ring-emerald-200">
                    {{-- (opsional) icon sederhana, boleh dihapus kalau tidak perlu --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6v6l4 2" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>

                <div class="leading-tight">
                    <h1 class="text-2xl font-extrabold tracking-tight text-emerald-900">
                        Pendataan Kejadian Bencana
                    </h1>
                    <p class="mt-1 text-sm text-slate-600">
                        Data kejadian bencana dan penanganan
                    </p>

                    {{-- Sub info kecil --}}
                    <div class="mt-3 inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1 text-xs font-medium text-emerald-800 ring-1 ring-emerald-100">
                        Sistem Monitoring & Pendataan
                    </div>
                </div>
            </div>

            {{-- CTA --}}
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                <a href="{{ route('bencana.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-700 px-5 py-3
                          text-sm font-semibold text-white shadow-sm ring-1 ring-emerald-800/10
                          hover:bg-emerald-800 transition">
                    {{-- icon plus (TETAP) --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Data Bencana
                </a>

                {{-- tombol opsional kecil --}}
                <div class="hidden sm:block">
                    
                </div>
            </div>
        </div>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="rounded-2xl border border-emerald-200 bg-white px-5 py-4 shadow-sm">
            <div class="flex items-start gap-3">
                <div class="mt-0.5 grid h-9 w-9 place-items-center rounded-xl bg-emerald-100 text-emerald-800 ring-1 ring-emerald-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-emerald-900">Berhasil</p>
                    <p class="mt-0.5 text-sm text-slate-600">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    {{-- SECTION TITLE --}}
    <div class="flex items-end justify-between">
        <div>
            <h2 class="text-lg font-bold text-emerald-900">Daftar Tahun</h2>
            <p class="mt-1 text-sm text-slate-600">Klik kartu untuk melihat data bencana per tahun.</p>
        </div>
    </div>

    {{-- KARTU TAHUN --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($tahunList as $tahun)
            <a href="{{ route('bencana.tahun', $tahun) }}"
               class="group relative overflow-hidden rounded-2xl border border-emerald-100 bg-white p-6 shadow-sm
                      hover:border-emerald-200 hover:shadow-md transition">

                {{-- Accent strip kiri --}}
                <div class="absolute inset-y-0 left-0 w-1 bg-emerald-600"></div>

                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-xs font-semibold tracking-wide text-emerald-700 uppercase">
                            Tahun
                        </p>
                        <h3 class="mt-2 text-4xl font-extrabold text-emerald-900">
                            {{ $tahun }}
                        </h3>
                        <p class="mt-2 text-sm text-slate-600">
                            Lihat data bencana tahun {{ $tahun }}
                        </p>
                    </div>

                    <div class="grid h-11 w-11 place-items-center rounded-xl bg-emerald-50 text-emerald-700 ring-1 ring-emerald-100
                                group-hover:bg-emerald-100 group-hover:text-emerald-900 transition">
                        {{-- arrow (TETAP) --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>

                {{-- footer chip --}}
                <div class="mt-5 flex items-center gap-2">
                    <span class="inline-flex items-center rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-800 ring-1 ring-emerald-100">
                        Data & Penanganan
                    </span>
                    
                    </span>
                </div>
            </a>
        @empty
            <div class="col-span-full rounded-2xl border border-emerald-100 bg-white p-10 text-center shadow-sm">
                <p class="text-lg font-semibold text-emerald-900">Belum ada data bencana.</p>
                <p class="mt-1 text-sm text-slate-600">Silakan tambah data baru untuk memulai.</p>

                <a href="{{ route('bencana.create') }}"
                   class="mt-6 inline-flex items-center gap-2 rounded-xl bg-emerald-700 px-5 py-3
                          text-sm font-semibold text-white hover:bg-emerald-800 transition">
                    {{-- icon plus (TETAP) --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Data Bencana
                </a>
            </div>
        @endforelse
    </div>

    {{-- FOOTER kecil --}}
    <div class="pt-2 text-center text-xs text-slate-500">
        © {{ date('Y') }} — Sistem Pendataan Kejadian Bencana
    </div>

</div>
</body>
</html>
