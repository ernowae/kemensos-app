<?php

namespace App\Http\Controllers;

use App\Http\Requests\PendampingRequest;
use App\Models\Lansia;
use App\Models\Pendamping;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PendampingController extends Controller
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
            'title'         => 'Data Pendamping',
            'page_category' => 'Data Master',
            'pendamping'    => DB::table('pendampings')->leftJoin('lansias', 'lansias.pendamping_id', '=', 'pendampings.id')->leftJoin('wilayahs', 'wilayahs.id', '=', 'pendampings.wilayah_id')->select(DB::raw('pendampings.*, COUNT(lansias.pendamping_id) AS jumlah, wilayahs.nama as wilayah'))->groupBy('pendampings.id')->get(),
        ];
        return view('pendamping.index')->with($params);
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
            'title'         => 'Tambah Data Pendamping',
            'page_category' => 'Data Master',
            'kecamatan'     =>  Wilayah::where('level', '4')->get(),
        ];
        // dd($params);
        return view('pendamping.create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PendampingRequest $request)
    {
        //
        $user                   = new User;
        $user->name             = $request->username;
        $user->email            = $request->email;
        $user->password         = bcrypt($request->password);
        $user->assignRole('pembimbing');
        $user->save();

        $get_id = User::orderBy('id', 'DESC')->first();

        $pendamping   = new Pendamping;
        $pendamping->user_id  = $get_id->id;
        $pendamping->nama     = $request->nama;
        $pendamping->nik      = $request->nik;
        $pendamping->hp       = $request->hp;
        $pendamping->alamat   = $request->alamat;
        $pendamping->wilayah_id = $request->kecamatan;

        $pendamping->save();

        return to_route('pendamping.index')->with('status', 'Data berhasil ditambah');
    }

    public function storeLansia(Request $request)
    {
        $pendamping = $request->get('pendamping');
        $id_lansia = $request->get('lansia');
        $data   = Lansia::find($id_lansia);

        $data->pendamping_id = $request->get('pendamping');
        $data->save();

        return to_route('pendamping.show', $pendamping)->with('status', 'Data lansia berhasil ditambahkan ke daftar');
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
        $pendamping         = Pendamping::findOrFail($id);
        $id_wilayah         = $pendamping->wilayah_id;
        $params = [
            'title'         => 'Detail Data Pendamping',
            'page_category' => 'Data Master',
            'pendamping'    => Pendamping::with('user', 'wilayah')->find($id),
            'jumlah'        => DB::table('lansias')->where('pendamping_id', $id)->count('id'),
            'data'          => Lansia::where('wilayah_id', $id_wilayah)->get(),
            'lansia'        => Lansia::where('pendamping_id', $id)->get(),
            'timline'       => Lansia::where('pendamping_id', $id)->orderBy('updated_at', 'asc')->first(),
        ];
        // dd($params['kecamatan']);
        return view('pendamping.show')->with($params);
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
            'title'         => 'Edit Data Pendamping',
            'page_category' => 'Data Master',
            'pendamping'    => Pendamping::with('user')->find($id),
            'kecamatan'     => Wilayah::get(),
        ];
        // dd($params['kecamatan']);
        return view('pendamping.edit')->with($params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        return to_route('pendamping.index')->with('status', 'Data berhasil di Update');
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
        $data = Pendamping::findOrFail($id);
        $data->delete();

        return to_route('pendamping.index')->with('status', 'Data berhasil dihapus');
    }


    public function destroyLansia(Request $request, $id)
    {
        //soft delete relation lansia->pendamping
        $id_lansia = $request->get('id');
        // dd($id_lansia);
        $data = Lansia::findOrFail($id_lansia);
        $data->pendamping_id = NULL;
        $data->save();

        return to_route('pendamping.show', $id)->with('status', 'Lansia berhasil dihapus dari daftar dampingan');
    }
}
