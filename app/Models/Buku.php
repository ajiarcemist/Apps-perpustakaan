<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'judul',
        'penerbit',
        'tgl_terbit',
        'stok',
    ];

    /**
     * Menambahkan stok buku.
     *
     * @param int $jumlah
     * @return void
     */
    public function increaseStock(int $jumlah)
    {
        // Validasi untuk memastikan jumlah penambahan stok tidak negatif
        if ($jumlah < 0) {
            throw new \InvalidArgumentException('Jumlah stok tidak boleh negatif.');
        }

        // Menambah stok buku dan menyimpan perubahan
        $this->stok += $jumlah;
        $this->save();
    }

    /**
     * Mengurangi stok buku.
     *
     * @param int $jumlah
     * @return void
     */
    public function decreaseStock(int $jumlah)
    {
        // Validasi untuk memastikan jumlah pengurangan stok tidak negatif dan tidak melebihi stok yang ada
        if ($jumlah < 0) {
            throw new \InvalidArgumentException('Jumlah stok tidak boleh negatif.');
        }

        if ($this->stok < $jumlah) {
            throw new \InvalidArgumentException('Stok buku tidak mencukupi.');
        }

        // Mengurangi stok buku dan menyimpan perubahan
        $this->stok -= $jumlah;
        $this->save();
    }
}
