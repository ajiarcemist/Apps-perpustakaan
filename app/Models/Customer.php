<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'no_anggota';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'no_anggota',
        'nama',
        'tgl_lahir',
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'customer_no_anggota');
    }
}
