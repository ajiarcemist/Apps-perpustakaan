@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h2>Selamat Datang di Aplikasi Perpustakaan</h2>
                    <p>Gunakan menu di bawah untuk mengakses berbagai fitur aplikasi perpustakaan.</p>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-header bg-primary text-white">{{ __('Tambah User') }}</div>
                                <div class="card-body">
                                    <p>Tambah data pengguna baru ke dalam sistem perpustakaan.</p>
                                    <a href="{{ route('customers.create') }}" class="btn btn-primary">Tambah User</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-header bg-success text-white">{{ __('Tambah Buku') }}</div>
                                <div class="card-body">
                                    <p>Tambah buku baru ke dalam koleksi perpustakaan.</p>
                                    <a href="{{ route('books.create') }}" class="btn btn-success">Tambah Buku</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-header bg-info text-white">{{ __('Daftar Buku') }}</div>
                                <div class="card-body">
                                    <p>Melihat daftar semua buku yang tersedia di perpustakaan.</p>
                                    <a href="{{ route('books.index') }}" class="btn btn-info">Daftar Buku</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-header bg-warning text-dark">{{ __('Peminjaman Buku') }}</div>
                                <div class="card-body">
                                    <p>Proses peminjaman buku oleh anggota.</p>
                                    <a href="{{ route('loans.create') }}" class="btn btn-warning">Peminjaman</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-header bg-danger text-white">{{ __('Pengembalian Buku') }}</div>
                                <div class="card-body">
                                    <p>Proses pengembalian buku yang telah dipinjam.</p>
                                    <a href="{{ route('returns.create') }}" class="btn btn-danger">Pengembalian</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card Baru untuk Daftar Customer -->
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-header bg-secondary text-white">{{ __('Daftar Customer') }}</div>
                                <div class="card-body">
                                    <p>Melihat daftar semua customer yang terdaftar di perpustakaan.</p>
                                    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Daftar Customer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection