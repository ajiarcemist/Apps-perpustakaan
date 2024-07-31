<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'customer_no_anggota', 'buku_id', 'jumlah_buku', 'tgl_pinjam', 'harga',
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_no_anggota', 'no_anggota');
    }
}
