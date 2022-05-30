<?php

namespace App\Http\Controllers;

use App\Models\Pimpinan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class profilePimpinanController extends Controller
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
        $user  = User::with('pimpinan')->find($id);
        $id_pimpinan = $user->pimpinan->id;
        // dd($id_pimpinan);

        $params = [
            'title'         => 'Profile',
            'page_category' => 'Menu',
            'pimpinan'      => Pimpinan::with('user')->find($id_pimpinan),
        ];


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

        return to_route('profile-pimpinan.index')->with('status', 'Data berhasil di Update');
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
