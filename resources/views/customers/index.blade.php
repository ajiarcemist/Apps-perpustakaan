@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Customer</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>No Anggota</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->nama }}</td>
                <td>{{ $customer->no_anggota }}</td>
                <td>{{ $customer->tgl_lahir }}</td>
                <td>
                    <form action="{{ route('customers.destroy', $customer->no_anggota) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection