<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Menampilkan daftar customer
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    // Menampilkan form tambah customer
    public function create()
    {
        return view('customers.create');
    }

    // Menyimpan data customer
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_anggota' => 'required|string|max:50|unique:customers',
            'tgl_lahir' => 'required|date',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index');
    }

    // Menghapus customer
    public function destroy($no_anggota)
    {
        $customer = Customer::where('no_anggota', $no_anggota)->firstOrFail();
        $customer->delete();

        return redirect()->route('customers.index');
    }
}
