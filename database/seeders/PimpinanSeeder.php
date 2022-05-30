<?php

namespace Database\Seeders;

use App\Models\Pimpinan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PimpinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Pimpinan::create([
            'user_id'       => 3,
            'nama'          => 'James iskandar Koto',
            'nik'           => '1222051101960003',
            'hp'            => '082277958348',
            'alamat'        => 'Jalan Sisingamangaraja No.8 RT 1 RW 3'
        ]);
    }
}
