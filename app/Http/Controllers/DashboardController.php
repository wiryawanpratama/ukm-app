<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ukm;
use App\Models\AnggotaUkm;
use App\Models\InfoLomba;
use App\Models\InfoUkm;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahUkm = Ukm::count();
        $jumlahAnggota = AnggotaUkm::count();

        // Ambil data info lomba dan info ukm
        $infoLomba = InfoLomba::orderBy('tanggal_mulai', 'desc')->take(5)->get();
        $infoUkm = InfoUkm::orderBy('tanggal', 'desc')->take(5)->get();

        return view('dashboard', compact('jumlahUkm', 'jumlahAnggota', 'infoLomba', 'infoUkm'));
    }
}