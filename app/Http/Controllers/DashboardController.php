<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lansia;
use App\Models\Pengajuan;
use App\Models\Sesi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Table\Table;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesi = DB::table('sesis')->join('pengajuans', 'pengajuans.sesi_id', '=', 'sesis.id')->select('sesis.*')->orderBy('sesis.id', 'desc')->first();
        // dd($sesi);
        $params = [
            'title'             => 'Dashboard',
            'page_category'     => 'Dashboard',
            'pengajuan'         => Pengajuan::all()->count(),
            'diterima'          => Pengajuan::where('keputusan', '=', 1)->count(),
            'totalBantuanTerkini' => Barang::join('pengajuans', 'barangs.pengajuan_id', '=', 'pengajuans.id')->where('status', 1)->where('sesi_id', $sesi->id)->sum('harga'),
        ];
        // dd($params);
        return view('dashboard.dashboard')->with($params);
    }
}
