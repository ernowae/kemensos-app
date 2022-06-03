<?php

namespace Database\Seeders;

use App\Models\Pengajuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Pengajuan::create([
            'sesi_id'               => 1,
            'lansia_id'             => 1,
            'status_pengajuan'      => 2,
            'nama_usaha'            => 'Gerobak asongan pecel lele',
            'keputusan'             => null,
            'ktp'                   => 'ktpasdasuieghfuiesbf.pdf',
            'kk'                    => 'kkasdasuieghfuiesbf.pdf',
            'penghasilan'           => 'pghslnasdasuieghfuiesbf.pdf',
            'pesan'                 => '',
        ]);

        Pengajuan::create([
            'sesi_id'               => 1,
            'lansia_id'             => 2,
            'status_pengajuan'      => 2,
            'nama_usaha'            => 'baso pentol 3 rasa',
            'keputusan'             => null,
            'ktp'                   => 'ktpasdasuieghfuiesbf.pdf',
            'kk'                    => 'kkasdasuieghfuiesbf.pdf',
            'penghasilan'           => 'pghslnasdasuieghfuiesbf.pdf',
            'pesan'                 => '',
        ]);
    }
}
