<?php

namespace App\Http\Controllers;

use App\Http\Requests\LansiaRequest;
use App\Models\Lansia;
use App\Models\Pendamping;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class LansiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = [
            'title'         => 'Data Lansia',
            'page_category' => 'Data Master',
            'lansia'        => Lansia::with('user', 'wilayah')->get(),
        ];
        // dd($params['lansia'][0]->user->email);
        return view('lansia.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title'         => 'Tambah Data Lansia',
            'page_category' => 'Data Master',
            'kecamatan'     => Wilayah::where('level', '4')->get(),
            'id'            =>  User::orderBy('id', 'DESC')->first(),
        ];
        // dd($params);
        return view('lansia.create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LansiaRequest $request)
    {
        // echo 'here';
        // die;
        $user                   = new User;
        $user->name             = $request->username;
        $user->email            = $request->email;
        $user->password         = Hash::make($request->password);
        $user->assignRole('lansia');
        $user->save();

        $get_id = User::orderBy('id', 'DESC')->first();

        $data                   = new Lansia;
        $data->user_id          = $get_id->id;
        $data->nama             = $request->nama;
        $data->nik              = $request->nik;
        $data->hp               = $request->hp;
        $data->alamat           = $request->alamat;
        $data->wilayah_id       = $request->kecamatan;
        $data->tempat_lahir     = $request->tempat_lahir;
        $data->tanggal_lahir    = $request->tanggal_lahir;
        $data->pekerjaan        = $request->pekerjaan;
        $data->penghasilan      = $request->penghasilan;
        $data->pendidikan       = $request->pendidikan;
        $data->agama            = $request->agama;

        $data->save();

        return to_route('lansia.index')->with('status', 'Data Lansia berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($c);
        $params = [
            'title'         => 'Detail Data Lansia',
            'page_category' => 'Data Master',
            'lansia'        => Lansia::with('user', 'wilayah')->find($id),
            'kecamatan'     => Wilayah::get(),
        ];
        // dd($params['kecamatan']);
        return view('lansia.show')->with($params);
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
            'title'         => 'Edit Data Lansia',
            'page_category' => 'Data Master',
            'lansia'        => Lansia::with('user')->find($id),
            'kecamatan'     => Wilayah::get(),
        ];
        // dd($params['kecamatan']);
        return view('lansia.edit')->with($params);
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

        return to_route('lansia.index')->with('status', 'Data berhasil diperbaharui');
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
        $data = Lansia::findOrFail($id);
        $data->delete();

        return to_route('lansia.index')->with('status', 'Data berhasil dihapus');
    }
}
