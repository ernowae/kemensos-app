<?php

namespace Database\Seeders;

use App\Models\Sesi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Sesi::factory(5)->create();

        Sesi::create([
            'tahun_anggaran'    => '2021/2022',
            'Status'            => 'Aktif',
            'Mulai'             => date("Y-m-d H:i:s"),
            'selesai'           => date("Y-m-d H:i:s"),
        ]);

        Sesi::create([
            'tahun_anggaran'    => '2022/2023',
            'Status'            => 'Nonaktif',
            'Mulai'             => date("Y-m-d H:i:s"),
            'selesai'           => date("Y-m-d H:i:s"),
        ]);

        Sesi::create([
            'tahun_anggaran'    => '2023/2024',
            'Status'            => 'Nonaktif',
            'Mulai'             => date("Y-m-d H:i:s"),
            'selesai'           => date("Y-m-d H:i:s"),
        ]);
    }
}
