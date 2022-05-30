@extends('layouts.app')


@section('content')

<div class="content-body">
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Wilayah Tugas</h4>
                    <div>
                        <a class="btn btn-relief-primary" href="{{ route('wilayah.create') }}">
                            <i data-feather='plus'></i> Tambah wilayah
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">
                       Pemetaan bantuan berdasarkan wilayah tugas yang terdaftar pada tabel dibawah ini
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Wilayah</th>
                                <th>Level Wilayah</th>
                                <th>Induk wilayah</th>
                                <th>Pendamping</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wilayah as $item)
                            <tr>
                                <td><span class="font-weight-bold">{{$loop->iteration}}</span> </td>
                                <td>{{ $item->nama }}</td>
                                <td><span class="font-weight-bold">{{ $item->level == '3' ? 'Kabupaten/Kota' : 'Kecamatan' }}</span> </td>
                                <td><span class="font-weight-bold">{{ $item->nama_induk }}</span> </td>
                                <td><span class="badge badge-pill mr-1 {{ $item->name != NULL ? 'badge-light-primary' : 'badge-light-danger' }}">{{ $item->name }}</span></td>
                                <td>
                                    <a class="btn btn-outline-info waves-effect btn-sm" href="{{ route('wilayah.edit', [$item->id]) }}">
                                        <i data-feather="edit-2" class="mr-50"></i>
                                        <span>Edit</span>
                                    </a>

                                    <a>
                                        <form onsubmit="return confirm('Hapus data secara Permanen?')" class="d-inline" action="{{route('wilayah.destroy', [$item->id])}}" method="POST">

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
