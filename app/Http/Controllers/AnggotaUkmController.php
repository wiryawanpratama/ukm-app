<?php

namespace App\Http\Controllers;

use App\Models\AnggotaUkm;
use App\Models\Ukm;
use Illuminate\Http\Request;

class AnggotaUkmController extends Controller
{
    public function index()
    {
        $anggota = AnggotaUkm::with('ukm')->get();
        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        $ukm = Ukm::all(); // buat dropdown pilihan UKM
        return view('anggota.create', compact('ukm'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'prodi' => 'required|string|max:100',
            'ukm_id' => 'required|exists:ukm,id',
        ]);

        AnggotaUkm::create($request->all());

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $anggota = AnggotaUkm::with('ukm')->findOrFail($id);
        return view('anggota.show', compact('anggota'));
    }

    public function edit(string $id)
    {
        $anggota = AnggotaUkm::findOrFail($id);
        $ukm = Ukm::all();
        return view('anggota.edit', compact('anggota', 'ukm'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'prodi' => 'required|string|max:100',
            'ukm_id' => 'required|exists:ukm,id',
        ]);

        $anggota = AnggotaUkm::findOrFail($id);
        $anggota->update($request->all());

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $anggota = AnggotaUkm::findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus!');
    }
}