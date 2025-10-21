<?php

namespace App\Http\Controllers;

use App\Models\InfoUkm;
use Illuminate\Http\Request;

class InfoUkmController extends Controller
{
    public function index()
    {
        // Tampilkan daftar info UKM
        $infoUkm = InfoUkm::latest()->paginate(10);
        return view('info.ukm.index', compact('infoUkm'));
    }

    public function create()
    {
        // Halaman tambah
        return view('info.ukm.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
        ]);

        InfoUkm::create($request->all());
        return redirect()->route('info.ukm.index')
                         ->with('success', 'Info UKM berhasil ditambahkan.');
    }

    public function edit(InfoUkm $ukm)
    {
        // Gunakan parameter yang sama seperti route resource
        return view('info.ukm.form', ['infoUkm' => $ukm]);
    }

    public function update(Request $request, InfoUkm $ukm)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
        ]);

        $ukm->update($request->all());
        return redirect()->route('info.ukm.index')
                         ->with('success', 'Info UKM berhasil diperbarui.');
    }

    public function destroy(InfoUkm $ukm)
    {
        $ukm->delete();
        return redirect()->route('info.ukm.index')
                         ->with('success', 'Info UKM berhasil dihapus.');
    }
}
