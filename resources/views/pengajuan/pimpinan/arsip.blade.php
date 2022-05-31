@extends('layouts.app')


@section('content')

<div class="content-body">
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Arsip Bantuan</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">
                       Arsip pengajuan bantuan oleh yang diajukan oleh lansia berdasarkan sepengetahuan pembimbing yang telah ditetapkan sebelumnya
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lansia</th>
                                <th>Nama Usaha</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Sesi</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td><span class="font-weight-bold">{{$loop->iteration}}</span> </td>
                                <td>{{ $data->lansia->nama }}</td>
                                <td>{{ $data->nama_usaha }}</td>
                                <td><span class="font-weight-bold">{{ $data->created_at }}</span> </td>
                                <th>{{ $data->sesi->tahun_anggaran }}</th>
                                <th>
                                    <div class="badge badge-pill badge-glow badge-primary">Diterima</div>
                                </th>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-outline-primary waves-effect btn-sm" href="{{ route('pengajuan-baru.show', [$data->id]) }}">

                                            <span><i data-feather='info'></i></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Tables end -->
</div>

@endsection

