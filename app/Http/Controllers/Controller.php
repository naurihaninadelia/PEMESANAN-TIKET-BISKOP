<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    // Menampilkan semua data film
    public function index()
    {
        $film = Film::all();
        return view('film.index', compact('film'));
    }

    // Menampilkan form tambah film
    public function create()
    {
        return view('film.create');
    }

    // Menyimpan data film
    public function store(Request $request)
    {
        Film::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'durasi' => $request->durasi,
            'genre' => $request->genre,
        ]);

        return redirect('/film');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $film = Film::findOrFail($id);
        return view('film.edit', compact('film'));
    }

    // Update data film
    public function update(Request $request, $id)
    {
        $film = Film::findOrFail($id);

        $film->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'durasi' => $request->durasi,
            'genre' => $request->genre,
        ]);

        return redirect('/film');
    }

    // Hapus data film
    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();

        return redirect('/film');
    }
}
