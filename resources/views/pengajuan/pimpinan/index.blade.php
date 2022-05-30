@extends('layouts.app')


@section('content')

<div class="content-body">
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pengajuan Bantuan</h4>
                    <div>
                        <blockquote class="blockquote pr-1 text-right border-right-primary border-right-3">
                            <p class="mb-0">
                                <div class="alert alert-primary alert-validation-msg" role="alert">
                                    <div class="alert-body">
                                        <p>Tahun Anggaran {{ $sesi->tahun_anggaran }}, <small> Hingga: {{ $sesi->selesai }} </small>
                                        </p>
                                    </div>
                                </div>

                            <footer class="blockquote-footer">
                                Sesi Aktif untuk pengjuan saat ini
                            </footer>
                        </blockquote>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">
                       Data pengajuan bantuan oleh yang diajukan oleh lansia berdasarkan sepengetahuan pembimbing yang telah ditetapkan sebelumnya
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
                                <td>
                                    <div class="row">
                                        <a class="btn btn-outline-info waves-effect btn-sm" href="{{ route('pengajuan-baru.show', [$data->id]) }}">
                                            <i data-feather='info'></i>
                                            <span>Lihat</span>
                                        </a>
                                        <a>
                                            <form onsubmit="return confirm('Terima pengajuan ini?')" class="form"  method="POST" action="{{ route('pengajuan-baru.terima', [$data->id]) }}">
                                                @csrf
                                                <input type="hidden" value="PUT" name="_method">
                                                <input type="hidden" name="id" value="{{ $data->id }}">
                                                <button type="submit" class="btn btn-outline-primary waves-effect"><i data-feather='check-circle'></i>Terima</button>
                                            </form>
                                        </a>

                                        {{-- <a class="btn btn-outline-primary waves-effect btn-sm" href="{{ route('pengajuan-baru.terima', [$data->id]) }}">
                                            <i data-feather='check-circle'></i>
                                            <span>Terima</span>
                                        </a> --}}
                                        <a class="btn btn-outline-danger waves-effect btn-sm" href="{{ route('pengajuan-baru.tolak', [$data->id]) }}">
                                            <i data-feather='x-square'></i>
                                            <span>Tolak</span>
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
