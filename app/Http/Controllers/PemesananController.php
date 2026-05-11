<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\User;
use App\Models\Jadwal;

class PemesananController extends Controller
{
    // Menampilkan semua pemesanan
    public function index()
    {
        $pemesanan = Pemesanan::with('user', 'jadwal')->get();
        return view('pemesanan.index', compact('pemesanan'));
    }

    // Form tambah pemesanan
    public function create()
    {
        $user = User::all();
        $jadwal = Jadwal::all();

        return view('pemesanan.create', compact('user', 'jadwal'));
    }

    // Simpan pemesanan
    public function store(Request $request)
    {
        Pemesanan::create([
            'id_user' => $request->id_user,
            'id_jadwal' => $request->id_jadwal,
            'jumlah_tiket' => $request->jumlah_tiket,
            'status_pemesanan' => $request->status_pemesanan,
        ]);

        return redirect('/pemesanan');
    }

    // Form edit pemesanan
    public function edit($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $user = User::all();
        $jadwal = Jadwal::all();

        return view('pemesanan.edit', compact('pemesanan', 'user', 'jadwal'));
    }

    // Update pemesanan
    public function update(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->update([
            'id_user' => $request->id_user,
            'id_jadwal' => $request->id_jadwal,
            'jumlah_tiket' => $request->jumlah_tiket,
            'status_pemesanan' => $request->status_pemesanan,
        ]);

        return redirect('/pemesanan');
    }

    // Hapus pemesanan
    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();

        return redirect('/pemesanan');
    }
}
