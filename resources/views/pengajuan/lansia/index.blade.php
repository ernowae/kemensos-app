@extends('layouts.app')


@section('content')

<div class="content-body">
    <section id="knowledge-base-search">
        <div class="row">
            <div class="col-12">
                <div class="card knowledge-base-bg text-center" style="background-image: url('{{ asset('app-assets/images/banner/banner.png') }}')">
                    <div class="card-body">
                        <h2 class="text-primary">Pengajuan Bantuan</h2>
                        @if ( $kondisi == 1 )
                            @include('pengajuan.lansia.tutup')
                        @elseif( $kondisi == 2 )
                            @include('pengajuan.lansia.buka')
                        @elseif($kondisi == 3)
                            @include('pengajuan.lansia.buka-habis')
                        @elseif($kondisi == 4)
                            <p class="card-text mb-2">
                                <span class="font-weight-bolder">Ada yang salah dengan halaman ini</span><span> silahkan hubungi pendamping untuk memeriksanya</span>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="blockquotes" class="row">
        <div class="col-md-12 mt-1">
            <div class="group-area">
                <h4>Riwayat Pengajuan</h4>
                <p>
                    Riwayat pengajuan bantuan yang diajukan oleh pengguna dapat dilihat dibawah ini.
                </p>
                <hr>
            </div>
        </div>
    </section>

    <div class="row match-height">
       <!-- Apply Job Card -->
       @foreach ($pengajuan as $item)
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card card-apply-job">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="media">
                            <div class="media-body">
                                <h5 class="mb-0">Pengajuan {{ $loop->iteration }}</h5>
                                <small class="text-muted"><?= \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() ?></small>
                            </div>
                        </div>
                        @if ( $item->keputusan == NULL )
                        <span class="badge badge-warning">Menunggu</span>
                        @elseif( $item->keputusan == 1 )
                        <span class="badge badge-primary">Diterima</span>
                        @else
                        <span class="badge badge-danger">Ditolak</span>
                        @endif
                    </div>
                    <h5 class="apply-job-title">{{ $item->nama_usaha }}.</h5>
                    <ul class="list-group list-group-flush mt-3">
                        <a target="_blank" href="{{asset('storage/'.$item->ktp)}}"><li class="list-group-item">Berkas KTP</li></a>
                        <a target="_blank" href="{{asset('storage/'.$item->kk)}}"><li class="list-group-item">Berkas KK</li></a>
                        <a target="_blank" href="{{asset('storage/'.$item->penghasilan)}}"><li class="list-group-item">Berkas Surat Keterangan Penghasilan</li></a>
                    </ul>
                    <div class="apply-job-package bg-light-primary rounded">
                        <div>
                            <sup class="text-body"><small>Status Pengajuan</small></sup> <br>
                            <h2 class="d-inline mr-25"> {{ $item->status_pengajuan == 1 ? 'Belum di proses' : ($item->status_pengajuan == 2 ? 'Proses Pendamping' : 'Proses Pimpinan' ) }}</h2>
                        </div>
                        <div class="badge badge-primary">{{ $item->tahun_anggaran }}</div>
                    </div>
                    @if ( $item->keputusan == 1 )
                    <a href="{{ route('barang.index', $item->id) }}" class="btn btn-primary btn-block waves-effect waves-float waves-light">Usulkan Barang Bantuan</a>
                    @endif

                </div>
            </div>
        </div>
       @endforeach
        <!--/ Apply Job Card -->
    </div>
</div>

@endsection
