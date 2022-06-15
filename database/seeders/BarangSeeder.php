<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Barang::create([
            'pengajuan_id'      => 1,
            'nama_barang'       => 'Becak Motor',
            'jumlah'            => 1,
            'harga'             => 12000000,
            'status'            => 0,
            'keterangan'        => NULL,
            'foto'              => 'sdjhfjdsgfuydsgf.pdf',
        ]);

        Barang::create([
            'pengajuan_id'      => 1,
            'nama_barang'       => 'rice Cooker',
            'jumlah'            => 1,
            'harga'             => 900000,
            'status'            => 0,
            'keterangan'        => NULL,
            'foto'              => 'afjhfjefej.pdf',
        ]);

        Barang::create([
            'pengajuan_id'      => 1,
            'nama_barang'       => 'Blender',
            'jumlah'            => 1,
            'harga'             => 370000,
            'status'            => 0,
            'keterangan'        => NULL,
            'foto'              => 'jasdjhf.pdf',
        ]);


        Barang::create([
            'pengajuan_id'      => 2,
            'nama_barang'       => 'Becak Motor',
            'jumlah'            => 1,
            'harga'             => 12000000,
            'status'            => 0,
            'keterangan'        => NULL,
            'foto'              => 'sdjhfjdsgfuydsgf.pdf',
        ]);

        Barang::create([
            'pengajuan_id'      => 2,
            'nama_barang'       => 'rice Cooker',
            'jumlah'            => 1,
            'harga'             => 900000,
            'status'            => 0,
            'keterangan'        => NULL,
            'foto'              => 'afjhfjefej.pdf',
        ]);

        Barang::create([
            'pengajuan_id'      => 2,
            'nama_barang'       => 'Blender',
            'jumlah'            => 1,
            'harga'             => 370000,
            'status'            => 0,
            'keterangan'        => NULL,
            'foto'              => 'jasdjhf.pdf',
        ]);
    }
}
