<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Bencana</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-emerald-50 px-4 py-10">
<div class="mx-auto max-w-3xl">

    <div class="rounded-2xl bg-white shadow-sm ring-1 ring-emerald-100">

        {{-- HEADER --}}
<div class="flex items-center gap-4 border-b border-emerald-100 px-8 py-6">

    {{-- ICON --}}
    <div class="grid h-11 w-11 place-items-center rounded-full bg-emerald-100">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="h-5 w-5 text-emerald-700 relative top-[1px]"
             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M16.862 3.487a2.1 2.1 0 0 1 2.97 2.97L8.5 17.79 4 19l1.21-4.5L16.862 3.487Z"/>
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15 5l4 4"/>
        </svg>
    </div>

    {{-- TEXT --}}
    <div class="leading-tight">
        <h1 class="text-xl font-semibold text-emerald-900">
            Edit Data Bencana
        </h1>
        <p class="mt-0.5 text-sm text-slate-600">
            Perbarui informasi kejadian bencana
        </p>
    </div>

</div>


        {{-- FORM --}}
<form action="{{ route('bencana.update', $bencana->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5 px-8 py-7">

            @csrf
            @method('PUT')

            {{-- Sungai --}}
            <div>
                <label class="mb-2 block text-sm font-medium text-emerald-900">
                    Sungai
                </label>
                <input
                    type="text"
                    name="sungai"
                    value="{{ old('sungai', $bencana->sungai) }}"
                    required
                    class="w-full rounded-lg border border-emerald-100 px-4 py-3 text-sm
                           focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
                @error('sungai')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Desa --}}
            <div>
                <label class="mb-2 block text-sm font-medium text-emerald-900">
                    Desa / Kelurahan
                </label>
                <input
                    type="text"
                    name="desa_kelurahan"
                    value="{{ old('desa_kelurahan', $bencana->desa_kelurahan) }}"
                    required
                    class="w-full rounded-lg border border-emerald-100 px-4 py-3 text-sm
                           focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
            </div>

            {{-- Kecamatan --}}
            <div>
                <label class="mb-2 block text-sm font-medium text-emerald-900">
                    Kecamatan
                </label>
                <input
                    type="text"
                    name="kecamatan"
                    value="{{ old('kecamatan', $bencana->kecamatan) }}"
                    required
                    class="w-full rounded-lg border border-emerald-100 px-4 py-3 text-sm
                           focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
            </div>

            {{-- Kabupaten --}}
            <div>
                <label class="mb-2 block text-sm font-medium text-emerald-900">
                    Kabupaten
                </label>
                <input
                    type="text"
                    name="kabupaten"
                    value="{{ old('kabupaten', $bencana->kabupaten) }}"
                    required
                    class="w-full rounded-lg border border-emerald-100 px-4 py-3 text-sm
                           focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
            </div>

            {{-- Tahun (dikunci) --}}
<input type="hidden" name="tahun" value="{{ old('tahun', $bencana->tahun) }}">

<div>
  <label class="mb-2 block text-sm font-medium text-emerald-900">Tahun</label>
  <input type="text"
         value="{{ old('tahun', $bencana->tahun) }}"
         readonly
         class="w-full rounded-lg border border-emerald-100 bg-emerald-50 px-4 py-3 text-sm text-slate-700">
  <p class="mt-2 text-xs text-slate-500">Tahun tidak bisa diubah saat edit.</p>
</div>

            {{-- Dampak --}}
            <div>
                <label class="mb-2 block text-sm font-medium text-emerald-900">
                    Dampak
                </label>
                <textarea
                    name="dampak"
                    rows="3"
                    required
                    class="w-full rounded-lg border border-emerald-100 px-4 py-3 text-sm
                           focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">{{ old('dampak', $bencana->dampak) }}</textarea>
            </div>

            {{-- Upaya --}}
            <div>
                <label class="mb-2 block text-sm font-medium text-emerald-900">
                    Upaya yang Dilakukan
                </label>
                <textarea
                    name="upaya_yang_dilakukan"
                    rows="3"
                    required
                    class="w-full rounded-lg border border-emerald-100 px-4 py-3 text-sm
                           focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">{{ old('upaya_yang_dilakukan', $bencana->upaya_yang_dilakukan) }}</textarea>
            </div>

            {{-- Keterangan --}}
            <div>
                <label class="mb-2 block text-sm font-medium text-emerald-900">
                    Keterangan
                </label>
                <textarea
                    name="keterangan"
                    rows="2"
                    required
                    class="w-full rounded-lg border border-emerald-100 px-4 py-3 text-sm
                           focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">{{ old('keterangan', $bencana->keterangan) }}</textarea>
            </div>

{{-- Foto (Opsional) --}}
<div>
    <label class="mb-2 block text-sm font-medium text-emerald-900">Foto (Opsional)</label>

    @if($bencana->foto)
        <div class="mb-3 flex items-center gap-3">
            <img src="{{ asset('storage/'.$bencana->foto) }}" alt="Foto bencana"
                 class="h-16 w-16 rounded-lg object-cover ring-1 ring-emerald-100">
            <p class="text-xs text-slate-600">Foto saat ini (upload baru untuk mengganti).</p>
        </div>
    @endif

    <input type="file" name="foto" accept="image/*"
           class="w-full rounded-lg border border-emerald-100 bg-white px-4 py-3 text-sm
                  file:mr-4 file:rounded-lg file:border-0 file:bg-emerald-50 file:px-4 file:py-2
                  file:text-sm file:font-semibold file:text-emerald-800
                  hover:file:bg-emerald-100
                  focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">

    @error('foto')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>


            {{-- BUTTON --}}
            <div class="flex gap-4 pt-4">
                <button
                    type="submit"
                    class="flex flex-1 items-center justify-center gap-2 rounded-lg
                           bg-emerald-700 px-4 py-3 text-sm font-semibold text-white
                           hover:bg-emerald-800 transition">

                    {{-- Icon Save --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7" />
                    </svg>

                    Update Data
                </button>

                <a href="{{ route('bencana.tahun', $bencana->tahun) }}"
                   class="flex flex-1 items-center justify-center gap-2 rounded-lg
                          border border-emerald-200 px-4 py-3 text-sm font-semibold
                          text-slate-700 hover:bg-emerald-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>

                    Batal
                </a>
            </div>

        </form>
    </div>
</div>
</body>
</html>
