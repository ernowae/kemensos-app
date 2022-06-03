<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Sesi;
use Illuminate\Http\Request;

class PengajuanPimpinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengambil sesi aktif, jika ada 2 maka di ambil sesi paling terakhir
        $sesi               = Sesi::where('status', '=', 'Aktif')->orderByDesc('id')->first();
        $id_sesi            = $sesi != NULL ? $sesi->id : NULL;


        $params = [
            'title'         => 'Pengajuan Baru',
            'page_category' => 'Pengajuan',
            //data diambil berdasarkan sesi yang sedang diaktifkan
            'data'          => Pengajuan::with('lansia', 'sesi')->where('keputusan', NULL)->where('status_pengajuan', 2)->where('sesi_id', $id_sesi)
                // ->whereHas('sesi', function ($q) {
                //     $q->where('status', '=', 'Aktif');
                // })
                ->get(),
            'sesi'          => Sesi::where('status', '=', 'Aktif')->first(),
        ];

        // dd($params);

        return view('pengajuan.pimpinan.index')->with($params);
    }

    public function show($id)
    {
        //
    }

    public function updateterima(Request $request, $id)
    {
        $data = Pengajuan::find($id);
        $data->keputusan    = 1;
        $data->save();

        return back()->with('status', 'Pengajuan berhasil di proses menjadi diterima');
    }

    public function updatetolak($id)
    {
        $data = Pengajuan::find($id);
        $data->keputusan    = 2;
        $data->save();

        return back()->with('status', 'Pengajuan berhasil di proses menjadi ditolak');
    }

    public function reset(Request $request, $id)
    {
        $data = Pengajuan::find($id);
        $data->keputusan    = NULL;
        $data->save();

        return back()->with('status', 'Pengajuan berhasil di reset');
    }

    // pengajuan diterima
    public function indexTerima()
    {
        //mengambil sesi aktif, jika ada 2 maka di ambil sesi paling terakhir
        $sesi               = Sesi::where('status', '=', 'Aktif')->orderByDesc('id')->first();
        $id_sesi            = $sesi != NULL ? $sesi->id : NULL;

        $params = [
            'title'         => 'Pengajuan Diterima',
            'page_category' => 'Pengajuan',
            //data diambil berdasarkan sesi yang sedang diaktifkan
            'data'          => Pengajuan::with('lansia', 'sesi')->where('keputusan', 1)->where('status_pengajuan', 2)->where('sesi_id', $id_sesi)
                // ->whereHas('sesi', function ($q) {
                //     $q->where('status', '=', 'Aktif');
                // })
                ->get(),
            'sesi'          => Sesi::where('status', '=', 'Aktif')->first(),
        ];

        // dd($params);

        return view('pengajuan.pimpinan.terima')->with($params);
    }

    public function indexTolak()
    {
        //mengambil sesi aktif, jika ada 2 maka di ambil sesi paling terakhir
        $sesi               = Sesi::where('status', '=', 'Aktif')->orderByDesc('id')->first();
        $id_sesi            = $sesi != NULL ? $sesi->id : NULL;

        $params = [
            'title'         => 'Pengajuan Ditolak',
            'page_category' => 'Pengajuan',
            //data diambil berdasarkan sesi yang sedang diaktifkan
            'data'          => Pengajuan::with('lansia', 'sesi')->where('keputusan', 2)->where('status_pengajuan', 2)->where('sesi_id', $id_sesi)
                // ->whereHas('sesi', function ($q) {
                //     $q->where('status', '=', 'Aktif');
                // })
                ->get(),
            'sesi'          => Sesi::where('status', '=', 'Aktif')->first(),
        ];

        // dd($params);

        return view('pengajuan.pimpinan.tolak')->with($params);
    }

    public function indexArsip()
    {

        $params = [
            'title'         => 'Pengajuan Arsip',
            'page_category' => 'Pengajuan',
            //data diambil berdasarkan sesi yang sedang diaktifkan
            'data'          => Pengajuan::with('lansia', 'sesi')->where('status_pengajuan', 2)->get(),
        ];

        // dd($params);

        return view('pengajuan.pimpinan.arsip')->with($params);
    }
}
