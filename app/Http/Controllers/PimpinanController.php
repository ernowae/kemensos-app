<?php

namespace App\Http\Controllers;

use App\Http\Requests\PimpinanRequest;
use App\Models\Pimpinan;
use App\Models\User;
use Illuminate\Http\Request;

class PimpinanController extends Controller
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
            'title'         => 'Data Pimpinan',
            'page_category' => 'Data Master',
            'pimpinan'      => Pimpinan::with('user')->get(),

        ];

        return view('pimpinan.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $params = [
            'title'         => 'Tambah Data Pimpinan',
            'page_category' => 'Data Master',
        ];
        // dd($params);
        return view('pimpinan.create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PimpinanRequest $request)
    {
        //
        $user                   = new User;
        $user->name             = $request->username;
        $user->email            = $request->email;
        $user->password         = bcrypt($request->password);
        $user->assignRole('pimpinan');
        $user->save();

        $get_id = User::orderBy('id', 'DESC')->first();

        $pendamping   = new Pimpinan;
        $pendamping->user_id  = $get_id->id;
        $pendamping->nama     = $request->nama;
        $pendamping->nik      = $request->nik;
        $pendamping->hp       = $request->hp;
        $pendamping->alamat   = $request->alamat;

        $pendamping->save();

        return to_route('pimpinan.index')->with('status', 'Data berhasil ditambah');
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
        //
        $params = [
            'title'         => 'Edit Data Pimpinan',
            'page_category' => 'Data Master',
            'pimpinan'    => Pimpinan::with('user')->find($id),
        ];
        // dd($params['kecamatan']);
        return view('pimpinan.edit')->with($params);
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
        $pimpinanData = Pimpinan::find($id);
        $id_user    = $pimpinanData->user_id;

        $user                   = User::findOrFail($id_user);
        $user->name             = $request->username;
        $user->email            = $request->email;
        $user->password         = bcrypt($request->password);

        $user->save();


        $pendamping   = Pimpinan::findOrFail($id);
        $pendamping->nama     = $request->nama;
        $pendamping->nik      = $request->nik;
        $pendamping->hp       = $request->hp;
        $pendamping->alamat   = $request->alamat;

        $pendamping->save();

        return to_route('pimpinan.index')->with('status', 'Data berhasil di Update');
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
        $data = Pimpinan::findOrFail($id);
        $data->delete();

        return to_route('pimpinan.index')->with('status', 'Data berhasil dihapus');
    }
}
