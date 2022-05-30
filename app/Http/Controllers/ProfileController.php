<?php

namespace App\Http\Controllers;

use App\Http\Requests\LansiaRequest;
use App\Models\Lansia;
use App\Models\Pendamping;
use App\Models\Pimpinan;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::user()->id;
        $user  = User::with('lansia')->find($id);
        $id_lansia = $user->lansia->id;

        $params = [
            'title'         => 'Profile',
            'page_category' => 'Menu',
            'lansia'        => Lansia::with('user')->find($id_lansia),
            'kecamatan'     => Wilayah::get(),
        ];

        // dd($params);

        return view('profile.index')->with($params);
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
            'title'         => 'Edit Data Profile',
            'page_category' => 'Data Master',
            'lansia'        => Lansia::with('user')->find($id),
            'kecamatan'     => Wilayah::get(),
        ];
        // dd($params['kecamatan']);
        return view('profile.lansia.edit')->with($params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LansiaRequest $request, $id)
    {
        //
        $lansiaData = Lansia::find($id);
        $id_user    = $lansiaData->user_id;

        $user = User::findOrFail($id_user);
        $user->name     = $request->username;
        $user->email    = $request->email;
        $user->password = $request->password;

        $user->save();

        $lansia =  Lansia::findOrFail($id);
        $lansia->user_id          = $id_user;
        $lansia->nama             = $request->nama;
        $lansia->nik              = $request->nik;
        $lansia->hp               = $request->hp;
        $lansia->alamat           = $request->alamat;
        $lansia->wilayah_id       = $request->kecamatan;
        $lansia->tempat_lahir     = $request->tempat_lahir;
        $lansia->tanggal_lahir    = $request->tanggal_lahir;
        $lansia->pekerjaan        = $request->pekerjaan;
        $lansia->penghasilan      = $request->penghasilan;
        $lansia->pendidikan       = $request->pendidikan;
        $lansia->agama            = $request->agama;

        $lansia->save();

        return to_route('profile.index')->with('status', 'Data berhasil diperbaharui');
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
