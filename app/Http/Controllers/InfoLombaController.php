<?php

namespace App\Http\Controllers;

use App\Models\InfoLomba;
use Illuminate\Http\Request;

class InfoLombaController extends Controller
{
    public function index()
    {
        $lombas = InfoLomba::latest()->paginate(10);
        return view('info.lomba.form', compact('lombas'));
    }

    public function create()
    {
        return view('info.lomba.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lomba' => 'required|string|max:255',
            'tipe' => 'required|in:Online,Offline',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        InfoLomba::create($request->all());
        return redirect()->route('info.lomba.index')->with('success', 'Info lomba berhasil ditambahkan.');
    }

    public function edit(InfoLomba $infoLomba)
    {
        return view('info.lomba.form', ['lomba' => $infoLomba]);
    }

    public function update(Request $request, InfoLomba $infoLomba)
    {
        $request->validate([
            'nama_lomba' => 'required|string|max:255',
            'tipe' => 'required|in:Online,Offline',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $infoLomba->update($request->all());
        return redirect()->route('info.lomba.index')->with('success', 'Info lomba berhasil diperbarui.');
    }

    public function destroy(InfoLomba $infoLomba)
    {
        $infoLomba->delete();
        return redirect()->route('info.lomba.index')->with('success', 'Info lomba berhasil dihapus.');
    }
}