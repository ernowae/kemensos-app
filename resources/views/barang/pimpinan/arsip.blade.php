@extends('layouts.app')


@section('content')

<div class="content-body">
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Arsip Usulan Barang</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">
                       Data usulan barang bantuan berdasarkan seleksi pengajuan yang telah diterima oleh pimpinan pada tahapan sebelumnya
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lansia</th>
                                <th>Nama Usaha</th>
                                <th>Barang</th>
                                <th>Total</th>
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
                                <td><span class="font-weight-bold"> {{ $data->barang->count() }} Item</span> </td>
                                <td><span class="font-weight-bold">Rp. {{  number_format($data->barang->sum('harga')); }}</span> </td>
                                <td> <div class="badge badge-pill badge-glow badge-{{ $data->progres == 1 ? 'info' : 'primary' }}">{{ $data->progres == 1 ? 'Sedang Proses' : 'Selesai' }}</div></td>
                                <td>
                                    <div class="row">
                                        {{-- show --}}
                                        <a class="btn btn-outline-info waves-effect btn-xm mb-1"  data-toggle="modal" data-backdrop="false" data-target="#backdrop-{{ $loop->index}}">

                                            <span><i data-feather='info'></i></span>
                                        </a>
                                        @hasrole('pimpinan')
                                        <a>
                                            <form onsubmit="return confirm('Reset pengajuan ini?')" class="form"  method="POST" action="{{ route('barang-pimpinan.reset', [$data->id]) }}">
                                                @csrf
                                                <input type="hidden" value="PUT" name="_method">
                                                <input type="hidden" name="id" value="{{ $data->id }}">
                                                <button type="submit" class="btn btn-outline-warning waves-effect"><i data-feather='rotate-ccw'></i></button>
                                            </form>
                                        </a>
                                        @endhasrole
                                    </div>
                                </td>
                            </tr>
                            @include('barang.pimpinan.modal')
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
