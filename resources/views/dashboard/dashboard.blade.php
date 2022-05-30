@extends('layouts.app')

@section('content')
<section id="dashboard-ecommerce">
    <div class="row match-height">
        <!-- Medal Card -->
        <div class="col-xl-4 col-md-6 col-12">
            <div class="card card-congratulation-medal">
                <div class="card-body">
                    <h5>Selamat Datang
                        @hasrole('pimpinan')
                        {{Auth::user()->pimpinan->nama}}
                        @elserole('pembimbing')
                        {{Auth::user()->pendamping->nama}}
                        @elserole('lansia')
                        {{Auth::user()->lansia->nama}}
                        @endhasrole
                    </h5>
                    <p class="card-text font-small-3">Kamu memiliki akses sebagai:</p>
                    <h3 class="mb-75 mt-2 pt-50">
                        <a href="javascript:void(0);">
                            @hasrole('pimpinan')
                            Pimpinan
                            @elserole('pembimbing')
                            Pendamping
                            @elserole('lansia')
                            Lansia
                            @endhasrole
                        </a>
                    </h3>
                    <button type="button" class="btn btn-primary">Mulai Aplikasi</button>
                </div>
            </div>
        </div>
        <!--/ Medal Card -->

        <!-- Statistics Card -->
        <div class="col-xl-8 col-md-6 col-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <h4 class="card-title">Statistik</h4>
                    <div class="d-flex align-items-center">
                        <p class="card-text font-small-2 mr-25 mb-0">Updated 1 month ago</p>
                    </div>
                </div>
                <div class="card-body statistics-body">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content">
                                        <i data-feather="trending-up" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0">230k</h4>
                                    <p class="card-text font-small-3 mb-0">Pengajuan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="media">
                                <div class="avatar bg-light-info mr-2">
                                    <div class="avatar-content">
                                        <i data-feather="user" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0">8.549k</h4>
                                    <p class="card-text font-small-3 mb-0">Pengguna</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                            <div class="media">
                                <div class="avatar bg-light-danger mr-2">
                                    <div class="avatar-content">
                                        <i data-feather="box" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0">1.423k</h4>
                                    <p class="card-text font-small-3 mb-0">Barang</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="media">
                                <div class="avatar bg-light-success mr-2">
                                    <div class="avatar-content">
                                        <i data-feather="dollar-sign" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0">$9745</h4>
                                    <p class="card-text font-small-3 mb-0">Nominal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Statistics Card -->
    </div>

    <div class="row match-height">
        <div class="col-lg-4 col-12">
            <div class="row match-height">
                <!-- Bar Chart - Orders -->
                <div class="col-lg-6 col-md-3 col-6">
                    <div class="card">
                        <div class="card-body pb-50">
                            <h6>Pengajuan Masuk</h6>
                            <h2 class="font-weight-bolder mb-1">67 Lansia</h2>
                            <div id="statistics-order-chart"></div>
                        </div>
                    </div>
                </div>
                <!--/ Bar Chart - Orders -->

                <!-- Line Chart - Profit -->
                <div class="col-lg-6 col-md-3 col-6">
                    <div class="card card-tiny-line-stats">
                        <div class="card-body pb-50">
                            <h6>Pengajuan diterima</h6>
                            <h2 class="font-weight-bolder mb-1">54 Lansia</h2>
                            <div id="statistics-profit-chart"></div>
                        </div>
                    </div>
                </div>
                <!--/ Line Chart - Profit -->

                <!-- Earnings Card -->
                <div class="col-lg-12 col-md-6 col-12">
                    <div class="card earnings-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="card-title mb-1">Bantuan Tersalurkan</h4>
                                    <div class="font-small-2">Sesi ini</div>
                                    <h5 class="mb-1">Rp. 345.997.765</h5>
                                    <p class="card-text text-muted font-small-2">
                                        <span class="font-weight-bolder">7%</span><span> lebih sedikit dari sesi sebelumnya.</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <div id="earnings-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Earnings Card -->
            </div>
        </div>

        <!-- Revenue Report Card -->
        <div class="col-lg-8 col-12">
            <div class="card card-revenue-budget">
                <div class="row mx-0">
                    <div class="col-md-8 col-12 revenue-report-wrapper">
                        <div class="d-sm-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title mb-50 mb-sm-0">Grafik Bantuan tiap sesi</h4>
                        </div>
                        <div id="revenue-report-chart"></div>
                    </div>
                    <div class="col-md-4 col-12 budget-wrapper">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                2020
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);">Sesi 1</a>
                            </div>
                        </div>
                        <h4 class="mb-25">Rp. 345.997.765</h4>
                        <div class="d-flex justify-content-center">
                            <span class="font-weight-bolder mr-25">Sesi saat ini</span>
                        </div>
                        <div id="budget-chart"></div>
                        <button type="button" class="btn btn-primary">Detail donasi</button>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Revenue Report Card -->
    </div>
</section>
@endsection

