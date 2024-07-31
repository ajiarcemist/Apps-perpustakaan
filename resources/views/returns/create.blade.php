@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Form untuk cek pengembalian buku -->
    <form action="{{ route('returns.show') }}" method="GET" id="return-form">
        @csrf
        <div class="form-group">
            <label for="no_anggota">No. Anggota</label>
            <input type="text" name="no_anggota" id="no_anggota" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Cek Pengembalian</button>
    </form>

    <!-- Modal untuk menampilkan detail peminjaman -->
    @if(isset($peminjaman) && $peminjaman->count() > 0)
    <div class="modal fade" id="loanModal" tabindex="-1" role="dialog" aria-labelledby="loanModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loanModalLabel">Detail Peminjaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Judul Buku</th>
                                <th>Jumlah Buku</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjaman as $pinjam)
                            <tr>
                                <td>{{ $pinjam->buku->judul }}</td>
                                <td>{{ $pinjam->jumlah_buku }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('returns.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="no_anggota" value="{{ $no_anggota }}">
                        <button type="submit" class="btn btn-success">Kembalikan Buku</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        $(document).ready(function() {
            $('#loanModal').modal('show');
        });
    </script>
    @endif
</div>
@endsection