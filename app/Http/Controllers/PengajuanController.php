<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Sesi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carbon = Carbon::now();
        $now  = date_format($carbon, "Y-m-d h:i:s");
        $jumlah = Sesi::where('status', '=', 'Aktif')->count();

        $id = 0;
        if ($sesi = Sesi::where('status', '=', 'Aktif')->first()) {
            $id   = $sesi->id;
        }
        // hitung jumnlah sesi aktif
        if ($jumlah == 0) {
            $kondisi = 1; // tidak ada sesi aktif
        } elseif ($jumlah == 1) {
            $sesi = Sesi::where('status', '=', 'Aktif')->first();
            $sesi_id = $sesi->id;
            // cek sudah ada pengajuan di sesi ini atau belum
            $pengajuan = Pengajuan::where('lansia_id', auth()->user()->id)->where('sesi_id', $sesi_id)->first();
            $lansia_id = $pengajuan->lansia_id;

            if (is_null($lansia_id)) {
                $selesai = $sesi->selesai;
                if ($selesai > $now) {
                    $kondisi = 2; // sesi aktif waktu tersedia
                } elseif ($selesai < $now) {
                    $kondisi = 3; // sesi aktif waktu habis
                }
            } else {
                $kondisi = 5; // sesi aktif waktu tersedia
            }
        } elseif ($jumlah > 1) {
            $kondisi = 4; // lebih dari 1 sesi aktif
        }
        // dd($kondisi, $selesai, $now);
        // dd($kondisi);

        $params = [
            'title'         => 'Pengajuan',
            'page_category' => 'Pengajuan',
            // get sesi aktif
            'sesi'          => $sesi,
            // count jumlah sesi aktif, jika lebih dari 1, maka tamplian ke kondisi 3 di index.blade.php
            'kondisi'       => $kondisi,
            // get data pengajuan riwayat
            'pengajuan'     => Pengajuan::with('sesi')->where('lansia_id', auth()->user()->id)->get(),
            // get jumlah pengajuan di sesi saat ini
            'jumlah'        => Pengajuan::where('sesi_id', $id)->count(),
        ];
        // dd($params);
        return view('pengajuan.lansia.index')->with($params);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $params = [
            'title'         => 'Daftar Bantuan',
            'page_category' => 'Pengajuan',
            'sesi'          => Sesi::where('id', $id)->first(),
            'id'            => auth()->user()->id,
        ];
        // dd($params);

        return view('pengajuan.lansia.show')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data   = new Pengajuan;
        $data->sesi_id              = $request->get('sesi_id');
        $data->lansia_id            = $request->get('lansia_id');
        $data->nama_usaha           = $request->get('nama_usaha');
        $data->status_pengajuan     = 1;
        if ($request->file('ktp')) {
            $file = $request->file('ktp')->store('pengajuan', 'public');
            $data->ktp = $file;
        }
        if ($request->file('kk')) {
            $file = $request->file('kk')->store('pengajuan', 'public');
            $data->kk = $file;
        }
        if ($request->file('penghasilan')) {
            $file = $request->file('penghasilan')->store('pengajuan', 'public');
            $data->penghasilan = $file;
        }
        // dd($data);
        $data->save();

        return to_route('pengajuan.index')->with('status', 'Pengajuan berhasil disimpan');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
