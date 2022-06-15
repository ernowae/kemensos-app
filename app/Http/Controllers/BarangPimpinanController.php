<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class BarangPimpinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $params = [
            'title'         => 'Data Usulan',
            'page_category' => 'Usulan Bansos',
            'data'          => Pengajuan::with('barang')->where('progres', '=', 1)->get(),
        ];
        // dd($params);

        return view('barang.pimpinan.index')->with($params);
    }

    public function arsip()
    {
        //
        $params = [
            'title'         => 'Arsip Usulan Barang',
            'page_category' => 'Usulan Bansos',
            'data'          => Pengajuan::with('barang')->where('progres', '=', 2)->get(),
        ];
        // dd($params);

        return view('barang.pimpinan.arsip')->with($params);
    }

    public function updateterima(Request $request, $id)
    {
        $data = Pengajuan::find($id);
        $data->progres    = 2;
        $data->save();

        return back()->with('status', 'usulan barang berhasil di proses menjadi diterima');
    }

    public function reset(Request $request, $id)
    {
        $data = Pengajuan::find($id);
        $data->progres    = 1;
        $data->save();

        return back()->with('status', 'Pengajuan berhasil di preset, silahkan periksa menu usulan baru');
    }

    public function updateusulan(Request $request, $id)
    {
        foreach ($request->id as $i => $id) {

            $data = Barang::findOrFail($id); // validations the product id
            // dd($request->status[$i]);
            $data->fill([
                'status' => $request->status[$i],
                'keterangan' => $request->keterangan[$i]
            ])->save();
        }


        return back()->with('status', 'usulan barang berhasil di proses');
    }
}
