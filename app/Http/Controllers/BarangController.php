<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $pengajuan = Pengajuan::where('id', $id)->first();
        $params = [
            'id'            => $id,
            'title'         => 'Usulan Barang',
            'page_category' => 'Pengajuan',
            'pengajuan'     => $pengajuan,
            'barang'        => Barang::where('pengajuan_id', $id)->get(),
        ];

        // dd($params);
        return view('barang.lansia.index')->with($params);
    }

    public function create($id)
    {
        //
        $pengajuan         = Pengajuan::where('id', $id)->first();
        $params = [
            'title'         => 'Usulan Barang',
            'page_category' => 'Pengajuan',
            'id'            => $pengajuan->id,
        ];

        // dd($params);
        return view('barang.lansia.create')->with($params);
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
        $data = new Barang;
        $data->pengajuan_id         = $request->get('pengajuan_id');
        $data->nama_barang          = $request->get('nama_barang');
        $data->jumlah               = $request->get('jumlah');
        $data->harga                = $request->get('harga');
        if ($request->file('foto')) {
            $file = $request->file('foto')->store('barang', 'public');
            $data->foto = $file;
        }
        $data->save();
        return to_route('barang.index', $request->get('pengajuan_id'))->with('status', 'usulan barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //
        $barang            = Barang::where('id', $id)->first();
        $params = [
            'title'         => 'Usulan Barang',
            'page_category' => 'Pengajuan',
            'data'          => $barang,
        ];

        // dd($params);
        return view('barang.lansia.edit')->with($params);
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
        $data = Barang::findOrFail($id);
        $data->nama_barang  = $request->nama_barang;
        $data->jumlah       = $request->jumlah;
        $data->harga        = $request->harga;

        if ($request->file('foto')) {
            if ($data->foto && file_exists(storage_path('app/public/' . $data->foto))) {
                \Storage::delete('public/' . $data->foto);
            }
            $file = $request->file('foto')->store('barang', 'public');
            $data->foto = $file;
        }

        $data->save();
        return to_route('barang.index', $data->pengajuan_id)->with('status', 'usulan barang berhasil diubah');
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
        $data = Barang::findOrFail($id);
        $data->delete();

        return back()->with('status', 'usulan barang berhasil dihapus');
    }
}
