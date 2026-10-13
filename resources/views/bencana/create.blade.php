<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Bencana</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-emerald-50 px-4 py-10">
    <div class="mx-auto w-full max-w-3xl">
        <div class="rounded-2xl bg-white shadow-sm ring-1 ring-emerald-100">

            {{-- Header --}}
            <div class="border-b border-emerald-100 px-8 py-6">
                <h1 class="text-center text-2xl font-semibold text-emerald-900">
                    Tambah Data Bencana
                </h1>
                <p class="mt-2 text-center text-sm text-slate-600">
                    Lengkapi data kejadian bencana dengan benar
                </p>
            </div>

            {{-- Form --}}
<form action="{{ route('bencana.store') }}" method="POST" enctype="multipart/form-data" class="px-8 py-7 space-y-5">
                @csrf

                {{-- Sungai --}}
                <div>
                   <label class="mb-2 block text-sm font-medium text-emerald-900">
    Sungai
</label>

                    <input
                        type="text"
                        name="sungai"
                        value="{{ old('sungai') }}"
                        required
                        class="w-full rounded-lg border border-emerald-100 px-4 py-3 text-sm
                               focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200"
                    >
                    @error('sungai')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Desa / Kelurahan --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-emerald-900">
    Desa / Kelurahan
</label>

                    <input
                        type="text"
                        name="desa_kelurahan"
                        value="{{ old('desa_kelurahan') }}"
                        required
                        class="w-full rounded-lg border border-emerald-100 px-4 py-3 text-sm
                               focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200"
                    >
                    @error('desa_kelurahan')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kecamatan --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-emerald-900">
    Kecamatan
</label>

                    <input
                        type="text"
                        name="kecamatan"
                        value="{{ old('kecamatan') }}"
                        required
                        class="w-full rounded-lg border border-emerald-100 px-4 py-3 text-sm
                               focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200"
                    >
                    @error('kecamatan')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kabupaten --}}
                <div>
                   <label class="mb-2 block text-sm font-medium text-emerald-900">
    Kabupaten
</label>

                    <input
                        type="text"
                        name="kabupaten"
                        value="{{ old('kabupaten') }}"
                        required
                        class="w-full rounded-lg border border-emerald-100 px-4 py-3 text-sm
                               focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200"
                    >
                    @error('kabupaten')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                @if(isset($tahunFixed))
                    {{-- Tahun FIX dari card --}}
                    <input type="hidden" name="tahun" value="{{ $tahunFixed }}">

                    <div>
                        <label class="mb-2 block text-sm font-medium text-emerald-900">
    Tahun
</label>

                        <input type="text"
                               value="{{ $tahunFixed }}"
                               readonly
                               class="w-full rounded-lg border border-emerald-100 bg-emerald-50 px-4 py-3 text-sm text-slate-700">
                        <p class="mt-2 text-xs text-slate-500">Tahun otomatis mengikuti card yang dipilih.</p>
                    </div>
                @else
                    {{-- Tahun BEBAS dari dashboard --}}
                    <div>
<label class="mb-2 block text-sm font-medium text-emerald-900">
    Tahun
</label>
                        <input type="number"
                               name="tahun"
                               value="{{ old('tahun', date('Y')) }}"
                               required
                               class="w-full rounded-lg border border-emerald-100 px-4 py-3 text-sm
                                      focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
                        @error('tahun')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                @endif

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
                               focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200"
                    >{{ old('dampak') }}</textarea>
                    @error('dampak')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
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
                               focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200"
                    >{{ old('upaya_yang_dilakukan') }}</textarea>
                    @error('upaya_yang_dilakukan')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
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
                               focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200"
                    >{{ old('keterangan') }}</textarea>
                </div>

                {{-- Foto (Opsional) --}}
<div>
    <label class="mb-2 block text-sm font-medium text-emerald-900">Foto (Opsional)</label>
    <input type="file" name="foto" accept="image/*"
           class="w-full rounded-lg border border-emerald-100 bg-white px-4 py-3 text-sm
                  file:mr-4 file:rounded-lg file:border-0 file:bg-emerald-50 file:px-4 file:py-2
                  file:text-sm file:font-semibold file:text-emerald-800
                  hover:file:bg-emerald-100
                  focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200">
    <p class="mt-2 text-xs text-slate-500">JPG/PNG/WEBP, maksimal 2MB.</p>
    @error('foto')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

                {{-- Button --}}
                <div class="flex gap-4 pt-4">
                    <button
                        type="submit"
                        class="flex-1 rounded-lg bg-emerald-700 px-4 py-3 text-sm font-semibold text-white
                               hover:bg-emerald-800 transition"
                    >
                        Simpan Data
                    </button>

                    <a href="{{ isset($tahunFixed) ? route('bencana.tahun', $tahunFixed) : route('bencana.index') }}"
                       class="flex flex-1 items-center justify-center rounded-lg
                              border border-emerald-200 px-4 py-3 text-sm font-semibold
                              text-slate-700 hover:bg-emerald-50 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
