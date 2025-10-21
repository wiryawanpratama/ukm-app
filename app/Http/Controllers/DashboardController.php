<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Ukm;
use App\Models\AnggotaUkm;
use App\Models\InfoLomba;
use App\Models\InfoUkm;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik dasar
        $jumlahUkm = Ukm::count();
        $jumlahAnggota = AnggotaUkm::count();

        // Info terbaru
        $infoLomba = InfoLomba::orderBy('tanggal_mulai', 'desc')->take(5)->get();
        $infoUkm   = InfoUkm::orderBy('tanggal', 'desc')->take(5)->get();

        // --- Chart 1: Distribusi Kategori/Bidang UKM ---
        // Pakai 'kategori' kalau ada; kalau tidak, pakai 'bidang'
        $kolomKategori = Schema::hasColumn('ukm', 'kategori')
            ? 'kategori'
            : (Schema::hasColumn('ukm', 'bidang') ? 'bidang' : null);

        $dataKategori = collect();
        if ($kolomKategori) {
            // hitung jumlah per kategori/bidang
            // countBy() = Collection helper untuk frekuensi
            $dataKategori = Ukm::whereNotNull($kolomKategori)
                ->pluck($kolomKategori)
                ->countBy(); // contoh: ["Olahraga" => 3, "Seni" => 2]
        }

        // --- Chart 2: Jumlah Anggota per UKM (label & data selaras) ---
        // join agar urutan label sama persis dengan data angka
        $anggotaPerUkm = Ukm::leftJoin('anggota_ukm', 'ukm.id', '=', 'anggota_ukm.ukm_id')
            ->select('ukm.id', 'ukm.nama_ukm')
            ->selectRaw('COUNT(anggota_ukm.id) AS total')
            ->groupBy('ukm.id', 'ukm.nama_ukm')
            ->orderBy('ukm.nama_ukm')
            ->get();

        $namaUkm            = $anggotaPerUkm->pluck('nama_ukm'); // labels
        $dataAnggotaPerUkm  = $anggotaPerUkm->pluck('total');    // data

        return view('dashboard', compact(
            'jumlahUkm',
            'jumlahAnggota',
            'infoLomba',
            'infoUkm',
            'dataKategori',
            'namaUkm',
            'dataAnggotaPerUkm'
        ));
    }
}