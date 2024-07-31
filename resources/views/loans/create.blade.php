@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Peminjaman Buku</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('loans.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="customer_no_anggota" class="form-label">No Anggota</label>
            <input type="text" class="form-control" id="customer_no_anggota" name="customer_no_anggota" required>
        </div>

        <div id="books-container">
            <div class="book-entry">
                <div class="mb-3">
                    <label class="form-label">ID Buku</label>
                    <input type="text" class="form-control book-id" name="buku_id[]" required>
                    <small class="text-danger book-id-error"></small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Buku</label>
                    <input type="number" class="form-control jumlah-buku" name="jumlah_buku[]" min="1" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga Buku</label>
                    <input type="text" class="form-control harga-buku" name="harga[]" readonly>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="{{ date('Y-m-d') }}" readonly>
        </div>

        <button type="button" class="btn btn-primary" id="add-book">Tambah Buku</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <script>
        const hargaPerBuku = 2500; // Harga per buku

        document.getElementById('add-book').addEventListener('click', function() {
            const container = document.getElementById('books-container');
            const newEntry = document.createElement('div');
            newEntry.classList.add('book-entry');
            newEntry.innerHTML = `
                <div class="mb-3">
                    <label class="form-label">ID Buku</label>
                    <input type="text" class="form-control book-id" name="buku_id[]" required>
                    <small class="text-danger book-id-error"></small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Buku</label>
                    <input type="number" class="form-control jumlah-buku" name="jumlah_buku[]" min="1" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga Buku</label>
                    <input type="text" class="form-control harga-buku" name="harga[]" readonly>
                </div>
            `;
            container.appendChild(newEntry);
        });

        document.getElementById('books-container').addEventListener('input', function(event) {
            if (event.target.classList.contains('jumlah-buku') || event.target.classList.contains('book-id')) {
                const entry = event.target.closest('.book-entry');
                const bukuId = entry.querySelector('.book-id').value;
                const jumlahBuku = parseInt(entry.querySelector('.jumlah-buku').value) || 0;
                const hargaBukuField = entry.querySelector('.harga-buku');
                const bookIdErrorField = entry.querySelector('.book-id-error');

                if (bukuId) {
                    fetch(`/books/check/${bukuId}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.exists) {
                                hargaBukuField.value = hargaPerBuku * jumlahBuku;
                                bookIdErrorField.textContent = '';
                            } else {
                                hargaBukuField.value = '';
                                bookIdErrorField.textContent = 'ID Buku tidak valid.';
                            }
                        })
                        .catch(error => {
                            hargaBukuField.value = '';
                            bookIdErrorField.textContent = 'Terjadi kesalahan saat memeriksa ID Buku.';
                        });
                } else {
                    hargaBukuField.value = '';
                    bookIdErrorField.textContent = '';
                }
            }
        });
    </script>
</div>
@endsection