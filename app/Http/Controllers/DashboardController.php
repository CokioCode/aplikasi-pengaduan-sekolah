<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $totalAspirasi = Aspirasi::count();
        $aspirasiBaru = Aspirasi::where('status', 'baru')->count();
        $aspirasiDiproses = Aspirasi::where('status', 'diproses')->count();
        $aspirasiSelesai = Aspirasi::where('status', 'selesai')->count();
        $totalSiswa = User::where('role', 'siswa')->count();

        $recentAspirasi = Aspirasi::with(['user', 'kategori'])
            ->latest('tanggal_aspirasi')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalAspirasi',
            'aspirasiBaru',
            'aspirasiDiproses',
            'aspirasiSelesai',
            'totalSiswa',
            'recentAspirasi'
        ));
    }

    public function siswaDashboard()
    {
        $userId = Auth::id();

        $totalAspirasi = Aspirasi::where('id_user', $userId)->count();
        $aspirasiBaru = Aspirasi::where('id_user', $userId)->where('status', 'baru')->count();
        $aspirasiDiproses = Aspirasi::where('id_user', $userId)->where('status', 'diproses')->count();
        $aspirasiSelesai = Aspirasi::where('id_user', $userId)->where('status', 'selesai')->count();

        $recentAspirasi = Aspirasi::with(['kategori', 'umpanBalik'])
            ->where('id_user', $userId)
            ->latest('tanggal_aspirasi')
            ->take(5)
            ->get();

        return view('siswa.dashboard', compact(
            'totalAspirasi',
            'aspirasiBaru',
            'aspirasiDiproses',
            'aspirasiSelesai',
            'recentAspirasi'
        ));
    }
}
