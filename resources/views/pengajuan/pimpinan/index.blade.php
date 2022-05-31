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
                            @if ($sesi != NULL)
                            <div>
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
                            </div>
                            @else
                            <div class="alert alert-danger alert-validation-msg" role="alert">
                                <p class="mb-0">Sesi pengajuan telah berakhir</p>
                            </div>
                            @endif

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
                                {{-- <th>Sesi</th> --}}
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
                                {{-- <th>{{ $data->sesi->tahun_anggaran }}</th> --}}
                                <td>
                                    <div class="row">
                                        {{-- show --}}
                                        {{-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-backdrop="false" data-target="#backdrop">
                                            Disabled Backdrop
                                        </button> --}}

                                        <a class="btn btn-outline-info waves-effect btn-sm" href="{{ route('pengajuan-baru.show', [$data->id]) }}" data-toggle="modal" data-backdrop="false" data-target="#backdrop">

                                            <span><i data-feather='info'></i></span>
                                        </a>
                                        {{-- acc --}}
                                        <a>
                                            <form onsubmit="return confirm('Terima pengajuan ini?')" class="form"  method="POST" action="{{ route('pengajuan-baru.terima', [$data->id]) }}">
                                                @csrf
                                                <input type="hidden" value="PUT" name="_method">
                                                <input type="hidden" name="id" value="{{ $data->id }}">
                                                <button type="submit" class="btn btn-outline-primary waves-effect"><i data-feather='check-circle'></i></button>
                                            </form>
                                        </a>
                                        {{-- reject --}}
                                        <a>
                                            <form onsubmit="return confirm('Tolak pengajuan ini?')" class="form"  method="POST" action="{{ route('pengajuan-baru.tolak', [$data->id]) }}">
                                                @csrf
                                                <input type="hidden" value="PUT" name="_method">
                                                <input type="hidden" name="id" value="{{ $data->id }}">
                                                <button type="submit" class="btn btn-outline-danger waves-effect"> <i data-feather='x-square'></i></button>
                                            </form>
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

@include('pengajuan.pimpinan.modal')

@push('script')
    <script>
        function swalDelete(id) {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Apakah yakin ingin menolak?',
                showCancelButton: true,
                confirmButtonText: 'Cool',
                customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-danger'
                },
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {
                $('#destroy-' + id).submit();
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })
        }
    </script>
@endpush
{{-- <button type="submit" class="btn btn-sm btn-danger btn-icon-split" onclick="swalDelete(' . $data->id . ' )">
    <span class="icon">
        <i class="fas fa-trash"></i>
    </span>
    <span class="text">Hapus</span>
</button>
<form id="destroy-' . $data->id . '" action="' . route('other-data.sumber-biaya.destroy', $data->id) . '" method="POST">
    <input type="hidden" name="_token" value="' . csrf_token() . '" />
    <input type="hidden" name="_method" value="delete" />
</form> --}}
