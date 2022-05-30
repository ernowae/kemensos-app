<?php

namespace Database\Seeders;

use App\Models\Pendamping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendampingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Pendamping::create([
            'user_id'       => 2,
            'wilayah_id'    => 2,
            'nama'          => 'Pendamping',
            'nik'           => '1222051101960003',
            'hp'            => '082277958348',
            'alamat'        => 'Jalan Sisingamangaraja No.8 RT 1 RW 3'
        ]);
    }
}
