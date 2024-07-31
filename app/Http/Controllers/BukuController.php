<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Menampilkan daftar buku
    public function index()
    {
        $books = Buku::all();  // Gunakan model Buku dengan nama yang benar
        return view('books.index', compact('books'));
    }

    // Menampilkan form tambah buku
    public function create()
    {
        return view('books.create');
    }

    // Menyimpan data buku
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tgl_terbit' => 'required|date',
            'stok' => 'required|integer',
        ]);

        Buku::create($request->all());

        return redirect()->route('books.index');
    }

    // Menghapus buku
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('books.index');
    }


    public function check($id)
    {
        $buku = Buku::find($id);
        return response()->json(['exists' => $buku !== null]);
    }
}
