<?php

namespace App\Http\Controllers;

use App\Models\UmpanBalik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmpanBalikController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_aspirasi' => 'required|exists:aspirasi,id_aspirasi',
            'isi_umpan_balik' => 'required|string',
        ]);

        UmpanBalik::create([
            'id_aspirasi' => $validated['id_aspirasi'],
            'id_user' => Auth::id(),
            'isi_umpan_balik' => $validated['isi_umpan_balik'],
            'tanggal_umpan_balik' => now(),
        ]);

        return back()->with('success', 'Umpan balik berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'isi_umpan_balik' => 'required|string',
        ]);

        $umpanBalik = UmpanBalik::findOrFail($id);
        $umpanBalik->update([
            'isi_umpan_balik' => $validated['isi_umpan_balik'],
            'tanggal_umpan_balik' => now(),
        ]);

        return back()->with('success', 'Umpan balik berhasil diupdate!');
    }

    public function destroy($id)
    {
        $umpanBalik = UmpanBalik::findOrFail($id);
        $umpanBalik->delete();

        return back()->with('success', 'Umpan balik berhasil dihapus!');
    }
}
