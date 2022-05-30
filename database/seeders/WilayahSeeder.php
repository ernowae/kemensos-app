<?php

namespace Database\Seeders;

use App\Models\Wilayah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Wilayah::create([
            'nama'  => 'Kabupaten Kampar',
            'level' => '3',
        ]);

        Wilayah::create([
            'nama'  => 'Bangkinang Kota',
            'level' => '4',
            'induk' => '1'
        ]);

        Wilayah::create([
            'nama'  => 'Bangkinang Seberang',
            'level' => '4',
            'induk' => '1'
        ]);
    }
}
