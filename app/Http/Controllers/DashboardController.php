<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ukm;
use App\Models\AnggotaUkm;

class DashboardController extends Controller
{
    public function index()
    {
        // nanti bisa ditambah data ringkasan
        $jumlahUkm = Ukm::count();
        $jumlahAnggota = AnggotaUkm::count();

        // kirim data ke view
        return view('dashboard', compact('jumlahUkm', 'jumlahAnggota'));
    }
}
