<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AspirasiController extends Controller
{
    public function create()
    {
        $kategori = Kategori::all();

        return view('siswa.aspirasi.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'judul_aspirasi' => 'required|string|max:255',
            'isi_aspirasi' => 'required|string',
        ]);

        Aspirasi::create([
            'id_user' => Auth::id(),
            'id_kategori' => $validated['id_kategori'],
            'judul_aspirasi' => $validated['judul_aspirasi'],
            'isi_aspirasi' => $validated['isi_aspirasi'],
            'tanggal_aspirasi' => now(),
            'status' => 'baru',
        ]);

        return redirect()->route('siswa.aspirasi.index')
            ->with('success', 'Aspirasi berhasil dikirim!');
    }

    public function indexSiswa()
    {
        $aspirasi = Aspirasi::with(['kategori', 'umpanBalik', 'progresPerbaikan'])
            ->where('id_user', Auth::id())
            ->latest('tanggal_aspirasi')
            ->get();

        return view('siswa.aspirasi.index', compact('aspirasi'));
    }

    public function indexAdmin(Request $request)
    {
        $query = Aspirasi::with(['user', 'kategori', 'umpanBalik', 'progresPerbaikan']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('id_kategori')) {
            $query->where('id_kategori', $request->id_kategori);
        }

        if ($request->filled('id_user')) {
            $query->where('id_user', $request->id_user);
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal_aspirasi', $request->tanggal);
        }

        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal_aspirasi', $request->bulan);
        }

        $aspirasi = $query->latest('tanggal_aspirasi')->paginate(10);
        $kategori = Kategori::all();

        return view('admin.aspirasi.index', compact('aspirasi', 'kategori'));
    }

    public function show($id)
    {
        $aspirasi = Aspirasi::with(['user', 'kategori', 'umpanBalik.user', 'progresPerbaikan'])
            ->findOrFail($id);

        if (Auth::user()->isSiswa() && $aspirasi->id_user !== Auth::id()) {
            abort(403);
        }

        return view('aspirasi.show', compact('aspirasi'));
    }

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:baru,diproses,selesai',
        ]);

        $aspirasi = Aspirasi::findOrFail($id);
        $aspirasi->update(['status' => $validated['status']]);

        return back()->with('success', 'Status aspirasi berhasil diupdate!');
    }
}
