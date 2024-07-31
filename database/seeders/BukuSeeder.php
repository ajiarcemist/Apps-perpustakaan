<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    public function run()
    {
        DB::table('buku')->insert([
            ['judul' => 'Pendidikan Kewarganegaraan', 'penerbit' => 'Penerbit A', 'tgl_terbit' => '2021-01-15', 'stok' => 3],
            ['judul' => 'Matematika Dasar', 'penerbit' => 'Penerbit B', 'tgl_terbit' => '2020-05-22', 'stok' => 5],
            ['judul' => 'Fisika untuk Semua', 'penerbit' => 'Penerbit C', 'tgl_terbit' => '2019-11-30', 'stok' => 4],
            ['judul' => 'Kimia Modern', 'penerbit' => 'Penerbit D', 'tgl_terbit' => '2022-02-14', 'stok' => 6],
            ['judul' => 'Biologi Terapan', 'penerbit' => 'Penerbit E', 'tgl_terbit' => '2021-07-19', 'stok' => 2],
            ['judul' => 'Sejarah Dunia', 'penerbit' => 'Penerbit F', 'tgl_terbit' => '2018-03-25', 'stok' => 3],
            ['judul' => 'Seni dan Budaya', 'penerbit' => 'Penerbit G', 'tgl_terbit' => '2020-08-14', 'stok' => 2],
            ['judul' => 'Ekonomi Makro', 'penerbit' => 'Penerbit H', 'tgl_terbit' => '2019-12-11', 'stok' => 4],
            ['judul' => 'Sosiologi Kontemporer', 'penerbit' => 'Penerbit I', 'tgl_terbit' => '2021-04-22', 'stok' => 5],
            ['judul' => 'Psikologi Umum', 'penerbit' => 'Penerbit J', 'tgl_terbit' => '2019-09-17', 'stok' => 6],
            ['judul' => 'Geografi Dunia', 'penerbit' => 'Penerbit K', 'tgl_terbit' => '2020-06-30', 'stok' => 5],
            ['judul' => 'Politik Internasional', 'penerbit' => 'Penerbit L', 'tgl_terbit' => '2018-10-05', 'stok' => 4],
            ['judul' => 'Teknik Informatika', 'penerbit' => 'Penerbit M', 'tgl_terbit' => '2021-12-01', 'stok' => 3],
            ['judul' => 'Manajemen Bisnis', 'penerbit' => 'Penerbit N', 'tgl_terbit' => '2022-03-15', 'stok' => 2],
            ['judul' => 'Hukum dan Peraturan', 'penerbit' => 'Penerbit O', 'tgl_terbit' => '2021-11-07', 'stok' => 5],
            ['judul' => 'Kesehatan Masyarakat', 'penerbit' => 'Penerbit P', 'tgl_terbit' => '2019-08-20', 'stok' => 2],
            ['judul' => 'Sastra Indonesia', 'penerbit' => 'Penerbit Q', 'tgl_terbit' => '2020-02-25', 'stok' => 3],
            ['judul' => 'Kepemimpinan dan Manajemen', 'penerbit' => 'Penerbit R', 'tgl_terbit' => '2018-07-12', 'stok' => 4],
            ['judul' => 'Filsafat dan Etika', 'penerbit' => 'Penerbit S', 'tgl_terbit' => '2021-09-15', 'stok' => 5],
            ['judul' => 'Statistik untuk Penelitian', 'penerbit' => 'Penerbit T', 'tgl_terbit' => '2019-12-05', 'stok' => 3],
            ['judul' => 'Pendidikan Anak Usia Dini', 'penerbit' => 'Penerbit U', 'tgl_terbit' => '2020-11-30', 'stok' => 2],
            ['judul' => 'Teknologi Informasi', 'penerbit' => 'Penerbit V', 'tgl_terbit' => '2018-05-10', 'stok' => 6],
            ['judul' => 'Entrepreneurship', 'penerbit' => 'Penerbit W', 'tgl_terbit' => '2021-10-20', 'stok' => 4],
            ['judul' => 'Metode Penelitian', 'penerbit' => 'Penerbit X', 'tgl_terbit' => '2022-04-15', 'stok' => 5],
            ['judul' => 'Seni Rupa', 'penerbit' => 'Penerbit Y', 'tgl_terbit' => '2019-07-22', 'stok' => 2],
            ['judul' => 'Ekologi', 'penerbit' => 'Penerbit Z', 'tgl_terbit' => '2020-01-18', 'stok' => 3],
        ]);
    }
}
