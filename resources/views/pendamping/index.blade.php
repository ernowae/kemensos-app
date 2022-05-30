@extends('layouts.app')


@section('content')

<div class="content-body">
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Master Pendamping</h4>
                    <div>
                        <a class="btn btn-relief-primary" href="{{ route('pendamping.create') }}">
                            <i data-feather='plus'></i> Tambah Pendamping
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">
                       Seluruh data pendamping yang terdaftar didalam aplikasi mencakup data diri dan data dampingan lansia
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lansia</th>
                                <th>Alamat</th>
                                <th>HP</th>
                                <th>Wilayah</th>
                                <th>jumlah Dampingan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendamping as $item)
                            <tr>
                                <td><span class="font-weight-bold">{{$loop->iteration}}</span> </td>
                                <td><b class="text-primary">{{ $item->nama }}</b> <br> <span>{{ $item->nik }}</span></td>
                                <td>{{ $item->alamat }}</span></td>
                                <td>{{ $item->hp }}</span></td>
                                @if ($item->wilayah != NULL)
                                <td>{{ $item->wilayah }}</td>
                                @else
                                <td><b class="text-danger">Belum ditentukan</b></td>
                                @endif
                                <td> <b class="{{ $item->jumlah > 0 ? 'text-primary' : 'text-danger' }}"> {{ $item->jumlah }} Lansia </b></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a type="button" class="btn btn-outline-primary waves-effect" href="{{ route('pendamping.show', [$item->id]) }}">
                                            <i data-feather='info'></i>
                                        </a>
                                        <a type="button" class="btn btn-outline-primary waves-effect" href="{{ route('pendamping.edit', [$item->id]) }}">
                                            <i data-feather='edit-3'></i>
                                        </a>
                                        <a>
                                            <form onsubmit="return confirm('Hapus data secara Permanen?')" class="d-inline" action="{{route('pendamping.destroy', [$item->id])}}" method="POST">

                                                @csrf
                                                @method("delete")
                                                <button type="submit" class="btn btn-outline-primary waves-effect"><i data-feather="trash" class="mr-50"></i></button>
                                            </form>
                                        </a>
                                    </div>

                                    {{-- <a>
                                        <form onsubmit="return confirm('Hapus data secara Permanen?')" class="d-inline" action="{{route('lansia.destroy', [$item->id])}}" method="POST">

                                            @csrf
                                            @method("delete")
                                            <button type="submit" class="btn btn-outline-danger waves-effect btn-sm"><i data-feather="trash" class="mr-50"></i></button>
                                        </form>
                                    </a> --}}
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
