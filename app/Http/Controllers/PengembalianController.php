<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function create()
    {
        return view('returns.create');
    }

    public function show(Request $request)
    {
        $request->validate([
            'no_anggota' => 'required|string',
        ]);

        // Temukan peminjaman berdasarkan no_anggota
        $peminjaman = Peminjaman::whereHas('customer', function ($query) use ($request) {
            $query->where('no_anggota', $request->no_anggota);
        })->with('buku')->get();

        // Kirimkan data peminjaman ke view
        return view('returns.create', [
            'peminjaman' => $peminjaman,
            'no_anggota' => $request->no_anggota,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_anggota' => 'required|string',
        ]);

        // Temukan peminjaman berdasarkan no_anggota
        $peminjaman = Peminjaman::whereHas('customer', function ($query) use ($request) {
            $query->where('no_anggota', $request->no_anggota);
        })->get();

        // Kembalikan stok buku
        foreach ($peminjaman as $pinjam) {
            $buku = Buku::findOrFail($pinjam->buku_id);
            $buku->increaseStock($pinjam->jumlah_buku);
        }

        // Hapus data peminjaman setelah pengembalian
        Peminjaman::whereHas('customer', function ($query) use ($request) {
            $query->where('no_anggota', $request->no_anggota);
        })->delete();

        return redirect()->route('returns.create')->with('success', 'Buku berhasil dikembalikan.');
    }
}
