<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konfirmasi;
use App\Models\Pemesanan;
use App\Models\User;

class KonfirmasiController extends Controller
{
    // Menampilkan semua konfirmasi
    public function index()
    {
        $konfirmasi = Konfirmasi::with('pemesanan', 'user')->get();
        return view('konfirmasi.index', compact('konfirmasi'));
    }

    // Form tambah konfirmasi
    public function create()
    {
        $pemesanan = Pemesanan::all();
        $user = User::all();

        return view('konfirmasi.create', compact('pemesanan', 'user'));
    }

    // Simpan konfirmasi
    public function store(Request $request)
    {
        Konfirmasi::create([
            'id_pemesanan' => $request->id_pemesanan,
            'id_user' => $request->id_user,
            'tanggal_konfirmasi' => $request->tanggal_konfirmasi,
            'status_konfirmasi' => $request->status_konfirmasi,
        ]);

        return redirect('/konfirmasi');
    }

    // Form edit konfirmasi
    public function edit($id)
    {
        $konfirmasi = Konfirmasi::findOrFail($id);
        $pemesanan = Pemesanan::all();
        $user = User::all();

        return view('konfirmasi.edit', compact('konfirmasi', 'pemesanan', 'user'));
    }

    // Update konfirmasi
    public function update(Request $request, $id)
    {
        $konfirmasi = Konfirmasi::findOrFail($id);

        $konfirmasi->update([
            'id_pemesanan' => $request->id_pemesanan,
            'id_user' => $request->id_user,
            'tanggal_konfirmasi' => $request->tanggal_konfirmasi,
            'status_konfirmasi' => $request->status_konfirmasi,
        ]);

        return redirect('/konfirmasi');
    }

    // Hapus konfirmasi
    public function destroy($id)
    {
        $konfirmasi = Konfirmasi::findOrFail($id);
        $konfirmasi->delete();

        return redirect('/konfirmasi');
    }
}
