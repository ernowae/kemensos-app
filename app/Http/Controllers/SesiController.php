<?php

namespace App\Http\Controllers;

use App\Http\Requests\SesiRequest;
use App\Models\Sesi;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = [
            'title'         => 'Sesi',
            'page_category' => 'Data Master',
            'sesi'          => Sesi::get(),
        ];

        return view('sesi.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title'             => 'Tambah Sesi',
            'page_category'     => 'Data Master',
            'tahun_anggaran'    => date('Y')
        ];

        return view('sesi.create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SesiRequest $request)
    {
        $new_sesi                   = new Sesi;
        $new_sesi->tahun_anggaran   = $request->tahun_anggaran;
        $new_sesi->status           = $request->status;
        $new_sesi->mulai            = $request->mulai;
        $new_sesi->selesai          = $request->selesai;

        $new_sesi->save();

        return to_route('sesi.index')->with('status', 'Data Sesi baru berhasil dtambahkan');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $params = [
            'data'              => Sesi::find($id),
            'tahun_anggaran'    => date('Y'),
            'title'             => 'Edit Sesi',
            'page_category'     => 'Data Master',
        ];

        // dd($params);

        return view('sesi.edit')->with($params);
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
        $data = Sesi::findOrFail($id);

        $data->tahun_anggaran = $request->get('tahun_anggaran');
        $data->status       = $request->get('status');
        $data->mulai        = $request->get('mulai');
        $data->selesai      = $request->get('selesai');

        $data->save();

        return to_route('sesi.index')->with('status', 'Data Berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Sesi::findOrFail($id);
        $data->delete();

        return to_route('sesi.index')->with('status', 'Data Berhasil di hapus');
    }
}
