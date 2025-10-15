<?php

namespace App\Http\Controllers;

use App\Models\AnggotaUkm;
use App\Models\Ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaUkmController extends Controller
{
    // 🧾 Tampilkan semua anggota UKM
    public function index()
    {
        $anggota = AnggotaUkm::with('ukm')->get();
        return view('anggota.index', compact('anggota'));
    }

    // 🆕 Tampilkan form tambah anggota
    public function create()
    {
        $ukm = Ukm::all();
        return view('anggota.create', compact('ukm'));
    }

    // 💾 Simpan data anggota baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'prodi' => 'required|string|max:100',
            'angkatan' => 'required|integer',
            'jenis_kelamin' => 'required|string',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'ukm_id' => 'required|exists:ukm,id',
        ]);

        $data = $request->all();

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_anggota', 'public');
        }

        AnggotaUkm::create($data);

        return redirect()->route('anggota.index')->with('success', 'Anggota UKM berhasil ditambahkan!');
    }

    // 👁️ Tampilkan detail anggota
    public function show($id)
    {
        $anggota = AnggotaUkm::with('ukm')->findOrFail($id);
        return view('anggota.show', compact('anggota'));
    }

    // ✏️ Form edit
    public function edit($id)
    {
        $anggota = AnggotaUkm::findOrFail($id);
        $ukm = Ukm::all();
        return view('anggota.edit', compact('anggota', 'ukm'));
    }

    // 🔄 Update data anggota
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'prodi' => 'required|string|max:100',
            'angkatan' => 'required|integer',
            'jenis_kelamin' => 'required|string',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'ukm_id' => 'required|exists:ukm,id',
        ]);

        $anggota = AnggotaUkm::findOrFail($id);
        $data = $request->all();

        // Ganti foto jika di-upload baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($anggota->foto && Storage::disk('public')->exists($anggota->foto)) {
                Storage::disk('public')->delete($anggota->foto);
            }

            $data['foto'] = $request->file('foto')->store('foto_anggota', 'public');
        }

        $anggota->update($data);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    // 🗑️ Hapus anggota UKM
    public function destroy($id)
    {
        $anggota = AnggotaUkm::findOrFail($id);

        // Hapus foto dari storage
        if ($anggota->foto && Storage::disk('public')->exists($anggota->foto)) {
            Storage::disk('public')->delete($anggota->foto);
        }

        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggota UKM berhasil dihapus!');
    }
}
