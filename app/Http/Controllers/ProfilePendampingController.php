<?php

namespace App\Http\Controllers;

use App\Http\Requests\PendampingRequest;
use App\Models\Pendamping;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilePendampingController extends Controller
{
    //
    public function index()
    {
        //
        $id = Auth::user()->id;
        $user  = User::with('pendamping')->find($id);
        $id_pendamping = $user->pendamping->id;
        // dd($id_pimpinan);

        $params = [
            'title'         => 'Profile',
            'page_category' => 'Menu',
            'pendamping'    => Pendamping::with('user')->find($id_pendamping),
            'jumlah'        => DB::table('lansias')->where('pendamping_id', $id_pendamping)->count('id'),
        ];

        // echo 'here';
        // die;

        return view('profile.index')->with($params);
    }

    public function edit($id)
    {
        //
        $params = [
            'title'         => 'Edit Data Pendamping',
            'page_category' => 'Data Master',
            'pendamping'    => Pendamping::with('user')->find($id),
            'kecamatan'     => Wilayah::get(),
        ];
        // dd($params['kecamatan']);
        return view('profile.pendamping.edit')->with($params);
    }

    public function update(PendampingRequest $request, $id)
    {
        //
        $lansiaData = Pendamping::find($id);
        $id_user    = $lansiaData->user_id;

        $user                   = User::findOrFail($id_user);
        $user->name             = $request->username;
        $user->email            = $request->email;
        $user->password         = bcrypt($request->password);

        $user->save();


        $pendamping   = Pendamping::findOrFail($id);
        $pendamping->nama     = $request->nama;
        $pendamping->nik      = $request->nik;
        $pendamping->hp       = $request->hp;
        $pendamping->alamat   = $request->alamat;
        $pendamping->wilayah_id = $request->kecamatan;

        $pendamping->save();

        return to_route('profile-pendamping.index')->with('status', 'Data berhasil di Update');
    }
}
