<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = [
            'title'         => 'Wilayah',
            'page_category' => 'Data Master',
            'wilayah'       => DB::table('wilayahs as induk')
                ->rightJoin('wilayahs as anak', 'anak.induk', '=', 'induk.id')
                ->leftJoin('pendampings', 'anak.id', '=', 'pendampings.wilayah_id')
                ->leftJoin('users', 'pendampings.user_id', '=', 'users.id')
                ->select(DB::raw('anak.*, induk.nama as nama_induk, users.name'))
                ->orderBy('induk.id', 'asc')
                ->get(),
        ];

        // dd($params);

        return view('wilayah.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title'         => 'Tambah Wilayah',
            'page_category' => 'Data Master',
            'induk'         => Wilayah::where('level', '3')->get(),
        ];

        // dd($params);

        return view('wilayah.create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama       = $request->get('nama');
        $level      = $request->get('level');
        $induk      = $request->get('induk');

        $new_wilayah            = new Wilayah;
        $new_wilayah->nama      = $nama;
        $new_wilayah->level     = $level;
        $new_wilayah->induk     = $induk;

        $new_wilayah->save();

        return to_route('wilayah.index')->with('status', 'Data wilayah berhasil di tambah');
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
            'wilayah'           => Wilayah::find($id),
            'title'             => 'Edit Sesi',
            'page_category'     => 'Data Master',
            'induk'             => Wilayah::where('level', '3')->get(),
        ];
        // dd($params);
        return view('wilayah.edit')->with($params);
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
        $data           = Wilayah::findOrFail($id);
        $data->nama     = $request->get('nama');
        $data->level    = $request->get('level');
        $data->induk    = $request->get('induk');
        $data->save();

        return to_route('wilayah.index')->with('status', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Wilayah::findOrFail($id);
        $data->delete();

        return to_route('wilayah.index')->with('status', 'Data wilayah berhasil di hapus');
    }
}
