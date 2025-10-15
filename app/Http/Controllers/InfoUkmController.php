<?php

namespace App\Http\Controllers;

use App\Models\InfoUkm;
use Illuminate\Http\Request;

class InfoUkmController extends Controller
{
    public function index()
    {
        $infoUkm = InfoUkm::latest()->paginate(10);
        return view('info.ukm.form', compact('infoUkm'));
    }

    public function create()
    {
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
        return redirect()->route('info-ukm.index')->with('success', 'Info UKM berhasil ditambahkan.');
    }

    public function edit(InfoUkm $infoUkm)
    {
        return view('info.ukm.form', ['infoUkm' => $infoUkm]);
    }

    public function update(Request $request, InfoUkm $infoUkm)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
        ]);

        $infoUkm->update($request->all());
        return redirect()->route('info-ukm.index')->with('success', 'Info UKM berhasil diperbarui.');
    }

    public function destroy(InfoUkm $infoUkm)
    {
        $infoUkm->delete();
        return redirect()->route('info-ukm.index')->with('success', 'Info UKM berhasil dihapus.');
    }
}