<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Film;

class JadwalController extends Controller
{
    // Menampilkan semua jadwal
    public function index()
    {
        $jadwal = Jadwal::with('film')->get();
        return view('jadwal.index', compact('jadwal'));
    }

    // Form tambah jadwal
    public function create()
    {
        $film = Film::all();
        return view('jadwal.create', compact('film'));
    }

    // Simpan jadwal
    public function store(Request $request)
    {
        Jadwal::create([
            'id_film' => $request->id_film,
            'tanggal' => $request->tanggal,
            'jam_tayang' => $request->jam_tayang,
        ]);

        return redirect('/jadwal');
    }

    // Form edit jadwal
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $film = Film::all();

        return view('jadwal.edit', compact('jadwal', 'film'));
    }

    // Update jadwal
    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update([
            'id_film' => $request->id_film,
            'tanggal' => $request->tanggal,
            'jam_tayang' => $request->jam_tayang,
        ]);

        return redirect('/jadwal');
    }

    // Hapus jadwal
    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect('/jadwal');
    }
}
