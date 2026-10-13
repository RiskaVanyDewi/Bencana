<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bencana Tahun {{ $tahun }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="min-h-screen bg-emerald-50 px-4 py-10">
<div class="mx-auto max-w-6xl">

    <div class="rounded-2xl bg-white shadow-sm ring-1 ring-emerald-100">

        {{-- HEADER --}}
        <div class="flex flex-col gap-4 border-b border-emerald-100 px-8 py-6 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-100 text-emerald-700">
                    {{-- icon calendar --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3M5 11h14M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-semibold text-emerald-900">
                        Data Bencana Tahun {{ $tahun }}
                    </h1>
                    <p class="text-sm text-slate-600">Daftar kejadian bencana dan penanganan</p>
                </div>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                <a href="{{ route('bencana.index') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-4 py-2.5 text-sm font-semibold
                          text-emerald-800 shadow-sm ring-1 ring-emerald-100 hover:bg-emerald-50 transition">
                    {{-- icon arrow-left --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>

                <a href="{{ route('bencana.create.year', $tahun) }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-700 px-4 py-2.5 text-sm font-semibold
                          text-white hover:bg-emerald-800 transition">
                    {{-- icon plus --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Data
                </a>
            </div>
        </div>

        {{-- ALERT --}}
        <div class="px-8 pt-6">
            @if(session('success'))
                <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-900">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        {{-- TABLE --}}
        <div class="px-8 py-6">
            @if($items->count() > 0)
                <div class="overflow-x-auto rounded-xl border border-emerald-100 bg-white">
                    <table class="min-w-full text-sm">
                        <thead class="bg-emerald-50 text-emerald-900">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold">No</th>
                                <th class="px-4 py-3 text-left font-semibold">Sungai</th>
                                <th class="px-4 py-3 text-left font-semibold">Desa/Kelurahan</th>
                                <th class="px-4 py-3 text-left font-semibold">Kecamatan</th>
                                <th class="px-4 py-3 text-left font-semibold">Kabupaten</th>
                                <th class="px-4 py-3 text-left font-semibold">Tahun</th>
                                <th class="px-4 py-3 text-left font-semibold">Dampak</th>
                                <th class="px-4 py-3 text-left font-semibold">Upaya</th>
                                <th class="px-4 py-3 text-left font-semibold">Keterangan</th>
                                <th class="px-4 py-3 text-left font-semibold">Foto</th>
                                <th class="px-4 py-3 text-center font-semibold">Aksi</th>

                            </tr>
                        </thead>

                        <tbody class="divide-y divide-emerald-100">
                            @foreach($items as $index => $item)
                                <tr class="hover:bg-emerald-50/40">
                                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                                    <td class="px-4 py-3">{{ $item->sungai }}</td>
                                    <td class="px-4 py-3">{{ $item->desa_kelurahan }}</td>
                                    <td class="px-4 py-3">{{ $item->kecamatan }}</td>
                                    <td class="px-4 py-3">{{ $item->kabupaten }}</td>
                                    <td class="px-4 py-3">{{ $item->tahun }}</td>

                                    <td class="px-4 py-3">
                                        <div class="max-w-[240px] truncate" title="{{ $item->dampak }}">
                                            {{ $item->dampak }}
                                        </div>
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="max-w-[240px] truncate" title="{{ $item->upaya_yang_dilakukan }}">
                                            {{ $item->upaya_yang_dilakukan }}
                                        </div>
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="max-w-[180px] truncate" title="{{ $item->keterangan }}">
                                            {{ $item->keterangan ?? '-' }}
                                        </div>
                                    </td>

                                  <td class="px-4 py-3 text-center">
    @if($item->foto)
        <button type="button"
                class="btn-foto inline-flex h-9 w-9 items-center justify-center rounded-lg
                       text-emerald-700 hover:bg-emerald-50 hover:text-emerald-900 transition"
                title="Lihat Foto"
                data-url="{{ asset('storage/'.$item->foto) }}">
            {{-- Icon Mata --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </button>
    @else
        <span class="text-xs text-slate-500">-</span>
    @endif
</td>

                                    {{-- AKSI ICON --}}
                                    <td class="px-4 py-3 align-middle">
                                        <div class="flex items-center justify-center gap-2">

                                            {{-- EDIT --}}
                                            <a href="{{ route('bencana.edit', $item->id) }}"
                                               class="grid h-9 w-9 place-items-center rounded-md leading-none
                                                      text-emerald-700 hover:bg-emerald-50 hover:text-emerald-900"
                                               title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="block h-5 w-5 relative top-px"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M16.862 3.487a2.1 2.1 0 0 1 2.97 2.97L8.5 17.79 4 19l1.21-4.5L16.862 3.487Z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M15 5l4 4"/>
                                                </svg>
                                            </a>

                                            {{-- HAPUS --}}
                                            <form action="{{ route('bencana.destroy', $item->id) }}"
                                                  method="POST"
                                                  class="m-0 p-0"
                                                  onsubmit="return confirm('Yakin hapus data ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="grid h-9 w-9 place-items-center rounded-md leading-none
                                                               text-red-600 hover:bg-red-50 hover:text-red-800"
                                                        title="Hapus">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         class="block h-5 w-5"
                                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                                                                 a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6
                                                                 M9 7h6m2 0H7m2-3h6a1 1 0 011 1v1H8V5a1 1 0 011-1z" />
                                                    </svg>
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="rounded-2xl border border-emerald-100 bg-white p-10 text-center shadow-sm">
                    <p class="text-lg font-semibold text-emerald-900">
                        Belum ada data untuk tahun {{ $tahun }}
                    </p>
                    <p class="mt-1 text-sm text-slate-600">
                        Silakan tambah data bencana baru.
                    </p>

                    <a href="{{ route('bencana.create.year', $tahun) }}"
                       class="mt-6 inline-flex items-center gap-2 rounded-xl bg-emerald-700 px-5 py-3 text-sm font-semibold text-white hover:bg-emerald-800 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Data Baru
                    </a>
                </div>
            @endif
        </div>

    </div>

</div>

{{-- MODAL FOTO --}}
<div id="fotoModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 p-4">
    <div class="w-full max-w-6xl overflow-hidden rounded-2xl bg-white shadow-xl ring-1 ring-emerald-100">

        {{-- Header --}}
        <div class="flex items-center justify-between border-b border-emerald-100 px-6 py-4">
            <h3 class="text-base font-semibold text-emerald-900">Foto Kejadian</h3>

            <button type="button"
                    class="grid h-10 w-10 place-items-center rounded-lg text-emerald-800 hover:bg-emerald-50 transition"
                    title="Tutup"
                    id="btnCloseFoto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Body --}}
        <div class="bg-white">
            <img id="fotoModalImg"
                 src=""
                 alt="Foto bencana"
                 class="block w-full h-auto max-h-[75vh] object-contain">
        </div>

        {{-- Footer --}}
        <div class="flex items-center justify-end gap-3 border-t border-emerald-100 px-6 py-4">
            <a id="fotoModalLink" href="#" target="_blank"
               class="rounded-lg border border-emerald-200 bg-white px-5 py-2.5 text-sm font-semibold
                      text-emerald-800 hover:bg-emerald-50 transition">
                Buka di Tab Baru
            </a>

            <button type="button"
                    class="rounded-lg bg-emerald-700 px-5 py-2.5 text-sm font-semibold text-white
                           hover:bg-emerald-800 transition"
                    id="btnCloseFoto2">
                Tutup
            </button>
        </div>

    </div>
</div>

<script>
    function openFotoModal(url) {
        const modal = document.getElementById('fotoModal');
        const img = document.getElementById('fotoModalImg');
        const link = document.getElementById('fotoModalLink');

        img.src = url;
        link.href = url;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeFotoModal() {
        const modal = document.getElementById('fotoModal');
        const img = document.getElementById('fotoModalImg');

        modal.classList.add('hidden');
        modal.classList.remove('flex');
        img.src = '';
        document.body.style.overflow = '';
    }

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.btn-foto').forEach(btn => {
            btn.addEventListener('click', () => openFotoModal(btn.dataset.url));
        });

        document.getElementById('btnCloseFoto').addEventListener('click', closeFotoModal);
        document.getElementById('btnCloseFoto2').addEventListener('click', closeFotoModal);

        const modal = document.getElementById('fotoModal');
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeFotoModal();
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) closeFotoModal();
        });
    });
</script>

</body>
</html>
