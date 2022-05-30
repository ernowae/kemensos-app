@extends('layouts.app')


@section('content')

<div class="content-body">
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sesi Pengajuan</h4>
                    <div>
                        <a class="btn btn-relief-primary" href="{{ route('sesi.create') }}">
                            <i data-feather='plus'></i> Tambah Sesi
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">
                       Sesi pengajuan di gunakan untuk membuka pengajuan dan menetapkan batas akhir pengajuan sesuai adminstrasi tahun anggaran yang berlangsung
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun Aggaran</th>
                                <th>Status</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sesi as $item)
                            <tr>
                                <td><span class="font-weight-bold">{{$loop->iteration}}</span> </td>
                                <td>{{ $item->tahun_anggaran }}</td>
                                <td><span class="badge badge-pill mr-1 {{ $item->status =='Aktif' ? 'badge-light-primary' : 'badge-light-danger' }}">{{ $item->status }}</span></td>
                                <td><span class="font-weight-bold">{{ $item->mulai }}</span> </td>
                                <td><span class="font-weight-bold">{{ $item->selesai }}</span> </td>
                                <td>
                                    <a class="btn btn-outline-info waves-effect btn-sm" href="{{ route('sesi.edit', [$item->id]) }}">
                                        <i data-feather="edit-2" class="mr-50"></i>
                                        <span>Edit</span>
                                    </a>

                                    <a>
                                        <form onsubmit="return confirm('Hapus data secara Permanen?')" class="d-inline" action="{{route('sesi.destroy', [$item->id])}}" method="POST">

                                            @csrf
                                            @method("delete")
                                            <button type="submit" class="btn btn-outline-danger waves-effect btn-sm"><i data-feather="trash" class="mr-50"></i>Hapus</button>
                                        </form>
                                    </a>
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
