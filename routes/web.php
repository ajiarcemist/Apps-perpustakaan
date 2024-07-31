<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\HomeController;

// Route untuk Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk Customer
Route::resource('customers', CustomerController::class)->except(['edit', 'update']);
Route::delete('customers/{customer:no_anggota}', [CustomerController::class, 'destroy'])->name('customers.destroy');

// Route untuk Buku
Route::resource('books', BukuController::class)->except(['edit', 'update']);
Route::get('/books/check/{id}', [BukuController::class, 'check'])->name('books.check');

// Route untuk Peminjaman
Route::get('loans/create', [PeminjamanController::class, 'create'])->name('loans.create');
Route::post('loans', [PeminjamanController::class, 'store'])->name('loans.store');
Route::get('loans', [PeminjamanController::class, 'index'])->name('loans.index');

// Route untuk Pengembalian
Route::get('returns/create', [PengembalianController::class, 'create'])->name('returns.create');
Route::get('returns/show', [PengembalianController::class, 'show'])->name('returns.show');
Route::post('returns', [PengembalianController::class, 'store'])->name('returns.store');
