 <!-- Modal -->
 <div class="modal fade text-left" id="backdrop-{{ $loop->index }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel4">Detail Data Pengajuan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <h6 class="files-section-title mb-75 text-danger">Data Lansia</h6>
                <dl class="row square-border">
                    <dt class="col-sm-3">Nama</dt>
                    <dd class="col-sm-9">{{ $data->lansia->nama }}.</dd>
                    <dt class="col-sm-3">NIK</dt>
                    <dd class="col-sm-9">{{ $data->lansia->nik }}.</dd>
                    <dt class="col-sm-3">Pendamping</dt>
                    <dd class="col-sm-9"><div class="badge badge-glow badge-primary">{{ $data->lansia->pendamping->nama }}.</div></dd>
                </dl>
                <hr class="devider-center">
                <dl class="row">
                    <dt class="col-sm-3">Alamat</dt>
                    <dd class="col-sm-9">{{ $data->lansia->alamat }}.</dd>
                    <dt class="col-sm-3">Kecamatan</dt>
                    <dd class="col-sm-9">{{ $data->lansia->wilayah->nama }}.</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3">Tempat lahir</dt>
                    <dd class="col-sm-9">{{ $data->lansia->tempat_lahir  }}, {{ $data->lansia->tanggal_lahir }}</dd>
                    {{-- <dt class="col-sm-3">Umur</dt>
                    <dd class="col-sm-9">43 Tahun.</dd> --}}
                    <dt class="col-sm-3">Agama</dt>
                    <dd class="col-sm-9">{{ $data->lansia->agama }}.</dd>

                </dl>
                <dl class="row">
                    <dt class="col-sm-3">Pendidikan Terakhir</dt>
                    <dd class="col-sm-9 ml-auto">{{ $data->lansia->pendidikan }}.</dd>
                    <dt class="col-sm-3">Pekerjaan</dt>
                    <dd class="col-sm-9">{{ $data->lansia->pekerjaan }}.</dd>
                    <dt class="col-sm-3">Jumlah Penghasilan</dt>
                    <dd class="col-sm-9">{{ $data->lansia->penghasilan }}.</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3">Pengajuan Ke</dt>
                    <dd class="col-sm-9">1.</dd>
                    <dt class="col-sm-3">Nama Usaha</dt>
                    <dd class="col-sm-9">{{ $data->nama_usaha }}.</dd>
                    <dt class="col-sm-3">Tanggal Pengajuan</dt>
                    <dd class="col-sm-9">{{ $data->created_at }}.</dd>
                </dl>
                <hr class="devider-center">


                <!-- drives area starts-->
                <div class="drives">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="files-section-title mb-75 text-danger">Berkas Pendukung</h6>
                        </div>

                        {{-- berkas --}}
                            <div class="col-xl-4 col-md-4 col-sm-6">
                                <div class="card text-center" data-toggle="tooltip" data-placement="top" title="{{ $data->ktp }}" data-original-title="Tooltip on top">
                                    <div class="card-body">
                                        <div class="avatar bg-light-info p-50 mb-1">
                                            <div class="avatar-content">
                                                <i data-feather='file-text'></i>
                                            </div>
                                        </div>
                                        <h2 class="font-weight-bolder">KTP</h2>
                                        <p class="card-text">Kartu Tanda Penduduk</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-sm-6">
                                <div class="card text-center" data-toggle="tooltip" data-placement="top" title="{{ $data->kk }}" data-original-title="Tooltip on top">
                                    <div class="card-body">
                                        <div class="avatar bg-light-warning p-50 mb-1">
                                            <div class="avatar-content">
                                                <i data-feather='file-text'></i>
                                            </div>
                                        </div>
                                        <h2 class="font-weight-bolder">KK</h2>
                                        <p class="card-text">Kartu Keluarga</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-sm-6">
                                <div class="card text-center" data-toggle="tooltip" data-placement="top" title="{{ $data->penghasilan }}" data-original-title="Tooltip on top">
                                    <div class="card-body">
                                        <div class="avatar bg-light-danger p-50 mb-1">
                                            <div class="avatar-content">
                                                <i data-feather='file-text'></i>
                                            </div>
                                        </div>
                                        <h2 class="font-weight-bolder">SK</h2>
                                        <p class="card-text">Surat Penghasilan</p>
                                    </div>
                                </div>
                            </div>
                        {{-- </div> --}}
                        {{-- berkas --}}

                    </div>
                </div>
                <!-- drives area ends-->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

