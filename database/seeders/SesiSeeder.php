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
            'Status'            => 'Nonaktif',
            'Mulai'             => date("2021-04-30 00:00:01"),
            'selesai'           => date("2021-07-30 23:59:59"),
        ]);

        Sesi::create([
            'tahun_anggaran'    => '2022/2023',
            'Status'            => 'Nonaktif',
            'Mulai'             => date("2022-04-30 00:00:01"),
            'selesai'           => date("2022-07-30 23:59:59"),
        ]);

        Sesi::create([
            'tahun_anggaran'    => '2023/2024',
            'Status'            => 'Nonaktif',
            'Mulai'             => date("2023-04-30 00:00:01"),
            'selesai'           => date("2023-07-30 23:59:59"),
        ]);
    }
}
