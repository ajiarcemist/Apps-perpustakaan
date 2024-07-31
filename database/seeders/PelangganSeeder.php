<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    public function run()
    {
        DB::table('customers')->insert([
            ['nama' => 'Ahmad Budi', 'no_anggota' => 'C001', 'tgl_lahir' => '1990-02-15'],
            ['nama' => 'Siti Aisyah', 'no_anggota' => 'C002', 'tgl_lahir' => '1985-06-20'],
            ['nama' => 'Joko Santoso', 'no_anggota' => 'C003', 'tgl_lahir' => '1992-11-05'],
            ['nama' => 'Dewi Sari', 'no_anggota' => 'C004', 'tgl_lahir' => '1988-09-10'],
            ['nama' => 'Budi Prasetyo', 'no_anggota' => 'C005', 'tgl_lahir' => '1995-03-30'],
            ['nama' => 'Rina Maharani', 'no_anggota' => 'C006', 'tgl_lahir' => '1991-07-25'],
        ]);
    }
}
