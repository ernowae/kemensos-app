<?php

namespace App\Http\Controllers;

use App\Models\Pendamping;
use App\Models\Pengajuan;
use App\Models\Sesi;
use Illuminate\Http\Request;

class PengajuanPimpinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           //data diambil berdasarkan sesi yang sedang diaktifkan dan berdasarkan level user
        if (auth()->user()->hasRole('pembimbing')) {
            // get data status pengajuan di proses pembimbing
            $data     = Pengajuan::with('lansia', 'sesi')->where('keputusan', NULL)->where('status_pengajuan', 2)->where('pengajuans.created_at', '<', 'sesi.selesai')
            ->whereHas('lansia', function ($q) {
                // get id pendamping
                $pendamping = Pendamping::where('user_id', auth()->user()->id)->first();
                $q->where('pendamping_id', $pendamping->id);
            })->get();
        } else {
            // get data status pengajuan di proses pimpinan
            // $data           = Pengajuan::with('lansia', 'sesi')->where('keputusan', NULL)->where('status_pengajuan', 3)->where('pengajuans.created_at', '<', 'sesi.selesai')->get();
            $date = date("Y m d");
            // dd($date);
            $data           = Pengajuan::join('lansias', 'lansias.id', '=', 'pengajuans.lansia_id')->join('sesis', 'sesis.id', '=', 'pengajuans.sesi_id')->where('keputusan', NULL)->where('status_pengajuan', 3)->whereDate('sesis.selesai', '>=', now())->get();
        }

        $params = [
            'title'         => 'Pengajuan Baru',
            'page_category' => 'Pengajuan',
            'data'          =>  $data,
            'sesi'          => Sesi::where('status', '=', 'Aktif')->first(),
        ];
        return view('pengajuan.pimpinan.index')->with($params);
    }

      // pengajuan diterima
      public function indexTerima()
      {
        if (auth()->user()->hasRole('pembimbing')) {
            // get data status pengajuan di proses pembimbing
            $data     = Pengajuan::with('lansia', 'sesi')->where('keputusan', 1)->where('status_pengajuan', 3)->where('pengajuans.created_at', '<', 'sesi.selesai')
            ->whereHas('lansia', function ($q) {
                // get id pendamping
                $pendamping = Pendamping::where('user_id', auth()->user()->id)->first();
                $q->where('pendamping_id', $pendamping->id);
            })->get();
        } else {
            // get data status pengajuan di proses pimpinan
            $data           = Pengajuan::join('lansias', 'lansias.id', '=', 'pengajuans.lansia_id')->join('sesis', 'sesis.id', '=', 'pengajuans.sesi_id')->where('keputusan', NULL)->where('status_pengajuan', 1)->whereDate('sesis.selesai', '>=', now())->get();
        }

          $params = [
              'title'         => 'Pengajuan Diterima',
              'page_category' => 'Pengajuan',
              'data'          => $data,
              'sesi'          => Sesi::where('status', '=', 'Aktif')->first(),
          ];

          // dd($params);

          return view('pengajuan.pimpinan.terima')->with($params);
      }

      public function indexTolak()
      {
        if (auth()->user()->hasRole('pembimbing')) {
            // get data status pengajuan di proses pembimbing
            $data     = Pengajuan::with('lansia', 'sesi')->where('keputusan', 2)->where('status_pengajuan', 2)->where('pengajuans.created_at', '<', 'sesi.selesai')
            ->whereHas('lansia', function ($q) {
                // get id pendamping
                $pendamping = Pendamping::where('user_id', auth()->user()->id)->first();
                $q->where('pendamping_id', $pendamping->id);
            })->get();
        } else {
            // get data status pengajuan di proses pimpinan
            $data           = Pengajuan::join('lansias', 'lansias.id', '=', 'pengajuans.lansia_id')->join('sesis', 'sesis.id', '=', 'pengajuans.sesi_id')->where('keputusan', 2)->where('status_pengajuan', 3)->whereDate('sesis.selesai', '>=', now())->get();
        }

          $params = [
              'title'         => 'Pengajuan Ditolak',
              'page_category' => 'Pengajuan',
              'data'          => $data,
              'sesi'          => Sesi::where('status', '=', 'Aktif')->first(),
          ];

          // dd($params);

          return view('pengajuan.pimpinan.tolak')->with($params);
      }

      public function indexArsip()
      {
           //data diambil berdasarkan sesi yang sedang diaktifkan dan berdasarkan level user
           if (auth()->user()->hasRole('pembimbing')) {
              // get arsip datapengajuan berdasarkan id pengguna
              $data     = Pengajuan::with('lansia', 'sesi')->whereHas('lansia', function ($q) {
                  // get id pendamping
                  $pendamping = Pendamping::where('user_id', auth()->user()->id)->first();
                  $q->where('pendamping_id', $pendamping->id);
              })->get();
          } else {
              $data           = Pengajuan::join('lansias', 'lansias.id', '=', 'pengajuans.lansia_id')->join('sesis', 'sesis.id', '=', 'pengajuans.sesi_id')->where('status_pengajuan', 3)->whereDate('sesis.selesai', '<=', now())->get();
          }

          $params = [
              'title'         => 'Pengajuan Arsip',
              'page_category' => 'Pengajuan',
              //data diambil berdasarkan sesi yang sedang diaktifkan
              'data'          => $data,
          ];

          // dd($params);

          return view('pengajuan.pimpinan.arsip')->with($params);
      }

    public function updateterima(Request $request, $id)
    {
        $data = Pengajuan::find($id);
        if (auth()->user()->hasRole('pembimbing')) {
            $data->status_pengajuan = 3;
        }
        if (auth()->user()->hasRole('pimpinan')) {
            $data->keputusan    = 1;
        }

        $data->save();

        return back()->with('status', 'Pengajuan berhasil di proses menjadi diterima');
    }

    public function updatetolak($id)
    {
        $data = Pengajuan::find($id);
        if (auth()->user()->hasRole('pembimbing')) {
            $data->status_pengajuan = 1;
        }
        if (auth()->user()->hasRole('pimpinan')) {
            $data->keputusan    = 2;
        }
        $data->save();

        return back()->with('status', 'Pengajuan berhasil di proses menjadi ditolak');
    }

    public function reset(Request $request, $id)
    {
        $data = Pengajuan::find($id);
        if (auth()->user()->hasRole('pembimbing')) {
            $data->status_pengajuan = 1;
        }
        if (auth()->user()->hasRole('pimpinan')) {
            $data->status_pengajuan = 3;
            $data->keputusan    = NULL;
        }
        $data->save();

        return back()->with('status', 'Pengajuan berhasil di reset');
    }


}
