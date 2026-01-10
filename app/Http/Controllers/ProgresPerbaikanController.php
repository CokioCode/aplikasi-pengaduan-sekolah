<?php

namespace App\Http\Controllers;

use App\Models\ProgresPerbaikan;
use Illuminate\Http\Request;

class ProgresPerbaikanController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_aspirasi' => 'required|exists:aspirasi,id',
            'keterangan_progres' => 'required|string',
            'status' => 'required|string|max:255',
        ]);

        ProgresPerbaikan::create([
            'id_aspirasi' => $validated['id_aspirasi'],
            'keterangan_progres' => $validated['keterangan_progres'],
            'tanggal_update' => now(),
            'status' => $validated['status'],
        ]);

        return back()->with('success', 'Progres perbaikan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'keterangan_progres' => 'required|string',
            'status' => 'required|string|max:255',
        ]);

        $progres = ProgresPerbaikan::findOrFail($id);
        $progres->update([
            'keterangan_progres' => $validated['keterangan_progres'],
            'tanggal_update' => now(),
            'status' => $validated['status'],
        ]);

        return back()->with('success', 'Progres perbaikan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $progres = ProgresPerbaikan::findOrFail($id);
        $progres->delete();

        return back()->with('success', 'Progres perbaikan berhasil dihapus!');
    }
}
