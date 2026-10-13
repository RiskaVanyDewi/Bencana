<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BencanaController extends Controller
{
     public function index()
    {
        $tahunList = Bencana::select('tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');
        
        return view('bencana.index', compact('tahunList'));
    }

    // Tampilkan semua data per tahun
    public function show($tahun)
    {
        $items = Bencana::where('tahun', $tahun)->get();
        return view('bencana.show', compact('items', 'tahun'));
    }

    // Form tambah
    public function create()
    {
        return view('bencana.create');
    }

    // Simpan data baru
    public function store(Request $request)
{
    $data = $request->validate([
        'sungai' => 'required|string|max:255',
        'desa_kelurahan' => 'required|string|max:255',
        'kecamatan' => 'required|string|max:255',
        'kabupaten' => 'required|string|max:255',
        'tahun' => 'required|integer',
        'dampak' => 'required|string',
        'upaya_yang_dilakukan' => 'required|string',
        'keterangan' => 'required|string',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('bencana', 'public');
    }

    Bencana::create($data);

return redirect()
    ->route('bencana.tahun', $data['tahun'])
    ->with('success', 'Data bencana berhasil ditambahkan.');
}


public function createForYear($tahun)
{
    return view('bencana.create', [
        'tahunFixed' => (int) $tahun
    ]);
}


    // Form edit
    public function edit(Bencana $bencana)
    {
        return view('bencana.edit', compact('bencana'));
    }

    // Update data
    public function update(Request $request, $id)
{
    $bencana = Bencana::findOrFail($id);

    $data = $request->validate([
        'sungai' => 'required|string|max:255',
        'desa_kelurahan' => 'required|string|max:255',
        'kecamatan' => 'required|string|max:255',
        'kabupaten' => 'required|string|max:255',
        'tahun' => 'required|integer',
        'dampak' => 'required|string',
        'upaya_yang_dilakukan' => 'required|string',
        'keterangan' => 'required|string',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($request->hasFile('foto')) {
        if ($bencana->foto && Storage::disk('public')->exists($bencana->foto)) {
            Storage::disk('public')->delete($bencana->foto);
        }
        $data['foto'] = $request->file('foto')->store('bencana', 'public');
    } else {
        unset($data['foto']); 
    }

    $bencana->update($data);

    return redirect()->route('bencana.tahun', $bencana->tahun)->with('success', 'Data bencana berhasil diperbarui.');
}


    // Hapus data
    public function destroy(Bencana $bencana)
    {
if ($bencana->foto && Storage::disk('public')->exists($bencana->foto)) {
        Storage::disk('public')->delete($bencana->foto);
    }

    $tahun = $bencana->tahun;
    $bencana->delete();

    return redirect()->route('bencana.tahun', $tahun)
        ->with('success', 'Data bencana berhasil dihapus.');    }
}
