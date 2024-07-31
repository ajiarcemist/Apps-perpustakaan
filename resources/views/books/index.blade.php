@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Buku</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penerbit</th>
                <th>Tanggal Terbit</th>
                <th>Stok</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->judul }}</td>
                <td>{{ $book->penerbit }}</td>
                <td>{{ $book->tgl_terbit }}</td>
                <td>{{ $book->stok }}</td>
                <td>
                    <!-- Action buttons, e.g., edit, delete -->
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
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