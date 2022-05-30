<?php

namespace Database\Seeders;

use App\Models\Lansia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LansiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Lansia::create([
            'user_id'       => 1,
            'pendamping_id' => 1,
            'nama'          => 'Nama Lansia',
            'nik'           => '1222051101960003',
            'hp'            => '082277958348',
            'alamat'        => 'Jalan Sisingamangaraja No.8 RT 1 RW 3',
            'wilayah_id'    => 2,
            'tempat_lahir'  => 'Silangkitang',
            'tanggal_lahir' => date("Y-m-d"),
            'pekerjaan'     => 'Kuli Bangunan',
            'penghasilan'   => '15000000',
            'pendidikan'    => 'SD',
            'agama'         => 'Islam',

        ]);
    }
}
