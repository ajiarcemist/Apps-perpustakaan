<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Customer;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Menampilkan form untuk membuat peminjaman buku.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('loans.create');
    }

    /**
     * Menyimpan data peminjaman buku ke dalam database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_no_anggota' => 'required|string',
            'buku_id' => 'required|array',
            'buku_id.*' => 'exists:buku,id',
            'jumlah_buku' => 'required|array',
            'jumlah_buku.*' => 'integer|min:1',
            'tgl_pinjam' => 'required|date',
        ]);

        $customer = Customer::where('no_anggota', $request->customer_no_anggota)->firstOrFail();
        $totalHarga = 0;

        foreach ($request->buku_id as $index => $bukuId) {
            $jumlahBuku = $request->jumlah_buku[$index];
            $buku = Buku::findOrFail($bukuId);

            if ($buku->stok < $jumlahBuku) {
                return redirect()->route('loans.create')->with('error', 'Stok buku dengan ID ' . $bukuId . ' tidak cukup.');
            }

            // Buat entri peminjaman
            Peminjaman::create([
                'customer_no_anggota' => $customer->no_anggota,
                'buku_id' => $bukuId,
                'jumlah_buku' => $jumlahBuku,
                'tgl_pinjam' => $request->tgl_pinjam,
                'harga' => 2500 * $jumlahBuku,
            ]);

            // Tambahkan harga per buku ke total harga
            $totalHarga += 2500 * $jumlahBuku;

            // Kurangi stok buku
            $buku->stok -= $jumlahBuku;
            $buku->save();
        }

        return redirect()->route('loans.create')->with('success', 'Peminjaman buku berhasil.');
    }

    /**
     * Menampilkan daftar peminjaman buku.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $peminjaman = Peminjaman::with('buku', 'customer')->get();
        return view('loans.index', compact('peminjaman'));
    }
}
