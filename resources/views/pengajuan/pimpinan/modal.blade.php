 <!-- Modal -->
 <div class="modal fade text-left" id="backdrop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel4">Detail Data Pengajuan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <h6 class="files-section-title mb-75 text-danger">Data Lansia</h6>
                </div>
                <dl class="row">
                    <dt class="col-sm-3">Nama</dt>
                    <dd class="col-sm-9">nama lansia.</dd>
                    <dt class="col-sm-3">NIK</dt>
                    <dd class="col-sm-9">1243243434.</dd>
                    <dt class="col-sm-3">Pendamping</dt>
                    <dd class="col-sm-9"><div class="badge badge-glow badge-primary">Imam al anwar.</div></dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3">Alamat</dt>
                    <dd class="col-sm-9">Jl Kotapinang, perenangan.</dd>
                    <dt class="col-sm-3">Kecamatan</dt>
                    <dd class="col-sm-9">Sialangkitang.</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3">Tempat lahir</dt>
                    <dd class="col-sm-9">kotapinang. 19 januari 1997</dd>
                    <dt class="col-sm-3">Umur</dt>
                    <dd class="col-sm-9">43 Tahun.</dd>
                    <dt class="col-sm-3">Agama</dt>
                    <dd class="col-sm-9">Islam.</dd>

                </dl>
                <dl class="row">
                    <dt class="col-sm-3">Pendidikan Terakhir</dt>
                    <dd class="col-sm-9 ml-auto">SD.</dd>
                    <dt class="col-sm-3">Pekerjaan</dt>
                    <dd class="col-sm-9">Wiraswasta.</dd>
                    <dt class="col-sm-3">Jumlah Penghasilan</dt>
                    <dd class="col-sm-9">14.000.000.</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3">Pengajuan Ke</dt>
                    <dd class="col-sm-9">1.</dd>
                    <dt class="col-sm-3">Nama Usaha</dt>
                    <dd class="col-sm-9">Gerobak dorong pecel lele.</dd>
                    <dt class="col-sm-3">Tanggal Pengajuan</dt>
                    <dd class="col-sm-9">1997 - 12- 22.</dd>
                </dl>

                <!-- drives area starts-->
                <div class="drives">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="files-section-title mb-75 text-danger">Berkas Pendukung</h6>
                        </div>

                        {{-- berkas --}}
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card shadow-none border cursor-pointer">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <img src="{{ asset('app-assets/images/icons/pdf.png') }}" alt="nama berkas" height="38">
                                        <div class="dropdown-items-wrapper">
                                           <i data-feather='menu'></i>
                                        </div>
                                    </div>
                                    <div class="my-1">
                                        <h5>KTP</h5>
                                        <span>Kartu Tanda Penduduk</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- berkas --}}

                        {{-- berkas --}}
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card shadow-none border cursor-pointer">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <img src="{{ asset('app-assets/images/icons/pdf.png') }}" alt="nama berkas" height="38">
                                        <div class="dropdown-items-wrapper">
                                           <i data-feather='menu'></i>
                                        </div>
                                    </div>
                                    <div class="my-1">
                                        <h5>KK</h5>
                                        <span>Kartu Keluarga</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- berkas --}}

                        {{-- berkas --}}
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card shadow-none border cursor-pointer">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <img src="{{ asset('app-assets/images/icons/pdf.png') }}" alt="nama berkas" height="38">
                                        <div class="dropdown-items-wrapper">
                                           <i data-feather='menu'></i>
                                        </div>
                                    </div>
                                    <div class="my-1">
                                        <h5>Surat Keterangan Penghasilan</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
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

