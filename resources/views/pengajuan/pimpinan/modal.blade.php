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
                <dl class="row">
                    <dt class="col-sm-3">Nama</dt>
                    <dd class="col-sm-9">nama lansia.</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3">Euismod</dt>
                    <dd class="col-sm-9">Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                </dl>
                <dl class="row">
                    <dt></dt>
                    <dd class="col-sm-9 ml-auto">Donec id elit non mi porta gravida at eget metus.</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3">Malesuada porta</dt>
                    <dd class="col-sm-9">Etiam porta sem malesuada magna mollis euismod.</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3 text-truncate">Truncated term is truncated</dt>
                    <dd class="col-sm-9">
                        Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet
                        risus.
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3">Nesting</dt>
                    <dd class="col-sm-9">
                        <dl class="row">
                            <dt class="col-sm-4">Nested definition list</dt>
                            <dd class="col-sm-8">Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc.</dd>
                        </dl>
                    </dd>
                </dl>

                <!-- drives area starts-->
                <div class="drives">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="files-section-title mb-75">Berkas Pendukung</h6>
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
                                        <h5>Nama File</h5>
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
                                        <h5>Nama File</h5>
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
                                        <h5>Nama File</h5>
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
                                        <h5>Nama File</h5>
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

