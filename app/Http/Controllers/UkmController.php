<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UkmController extends Controller
{
    // Tampilkan semua UKM
    public function index()
    {
        $ukm = Ukm::with('user')->get();
        return view('ukm.index', compact('ukm'));
    }

    // Tampilkan form tambah UKM
    public function create()
    {
        return view('ukm.create');
    }

    // Simpan UKM baru
    public function store(Request $request)
{
    $request->validate([
        'nama_ukm' => 'required|string|max:255',
        'bidang' => 'required|string|max:255',
        'ketua_ukm' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
    ]);

    Ukm::create([
        'nama_ukm' => $request->nama_ukm,
        'bidang' => $request->bidang,
        'ketua_ukm' => $request->ketua_ukm,
        'deskripsi' => $request->deskripsi,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('ukm.index')->with('success', 'UKM berhasil ditambahkan!');
}



    // Detail UKM
    public function show(string $id)
    {
        $ukm = Ukm::with('anggota')->findOrFail($id);
        return view('ukm.show', compact('ukm'));
    }

    // Form edit
    public function edit(string $id)
    {
        $ukm = Ukm::findOrFail($id);
        return view('ukm.edit', compact('ukm'));
    }

    // Update data
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_ukm' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $ukm = Ukm::findOrFail($id);
        $ukm->update($request->only('nama_ukm', 'deskripsi'));

        return redirect()->route('ukm.index')->with('success', 'UKM berhasil diperbarui!');
    }

    // Hapus data
    public function destroy(string $id)
    {
        $ukm = Ukm::findOrFail($id);
        $ukm->delete();

        return redirect()->route('ukm.index')->with('success', 'UKM berhasil dihapus!');
    }
}