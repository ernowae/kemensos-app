@extends('layouts.app')

@section('content')

<section class="app-user-view">
    <!-- User Card & Plan Starts -->
    <div class="row">
        <!-- User Card starts-->
        <div class="col-xl-8 col-lg-7 col-md-6">
            <div class="card user-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                            <div class="user-avatar-section">
                                <div class="d-flex justify-content-start">
                                    <img class="img-fluid rounded" src="../../../app-assets/images/avatars/7.png" height="104" width="104" alt="User avatar" />
                                    <div class="d-flex flex-column ml-1">
                                        <div class="user-info mb-1">
                                            <h4 class="mb-0">{{ $lansia->nama }}</h4>
                                            <p class="card-text">Nama Pendamping :
                                                @if ($lansia->pendamping_id != NULL)
                                                <span class="text-primary"> {{ $lansia->pendamping->nama }}</span>
                                                @else
                                                <span class="text-danger"> Belum ditentukan</span>
                                                @endif

                                            </p>


                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <a href="{{ route('lansia.edit',[$lansia->id]) }}" class="btn btn-primary">Edit</a>
                                            <button class="btn btn-outline-danger ml-1">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                            <div class="user-info-wrapper">
                                <div class="d-flex flex-wrap">
                                    <div class="user-info-title">
                                        <i data-feather="user" class="mr-1"></i>
                                        {{-- <h1 class="text-primary">Display heading</h1> --}}
                                        <span class="card-text user-info-title font-weight-bold mb-0">NIK</span>
                                    </div>
                                    <p class="card-text mb-0">{{ $lansia->nik }}</p>
                                </div>
                                <div class="d-flex flex-wrap my-50">
                                    <div class="user-info-title">
                                        <i data-feather="check" class="mr-1"></i>
                                        <span class="card-text user-info-title font-weight-bold mb-0">Alamat</span>
                                    </div>
                                    <p class="card-text mb-0">{{ $lansia->alamat }}</p>
                                </div>
                                <div class="d-flex flex-wrap my-50">
                                    <div class="user-info-title">
                                        <i data-feather="flag" class="mr-1"></i>
                                        <span class="card-text user-info-title font-weight-bold mb-0">Kecamatan</span>
                                    </div>
                                    <p class="card-text mb-0">{{ $lansia->wilayah->nama }}</p>
                                </div>
                                <div class="d-flex flex-wrap my-50">
                                    <div class="user-info-title">
                                        <i data-feather="star" class="mr-1"></i>
                                        <span class="card-text user-info-title font-weight-bold mb-0">Agama</span>
                                    </div>
                                    <p class="card-text mb-0">{{ $lansia->agama }}</p>
                                </div>

                                <div class="d-flex flex-wrap">
                                    <div class="user-info-title">
                                        <i data-feather="phone" class="mr-1"></i>
                                        <span class="card-text user-info-title font-weight-bold mb-0">hp</span>
                                    </div>
                                    <p class="card-text mb-0">{{ $lansia->hp }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /User Card Ends-->

        <!-- Plan Card starts-->
        <div class="col-xl-4 col-lg-5 col-md-6">
            <div class="card plan-card border-primary">
                <div class="card-header d-flex justify-content-between align-items-center pt-75 pb-1">
                    <h5 class="mb-0">Timeline Pengguna</h5>
                    <span class="badge badge-light-secondary" data-toggle="tooltip" data-placement="top" title="Expiry Date">Bergabung Sejak, <span>{{ $lansia->created_at }}</span>
                    </span>
                </div>
                <div class="card-body">
                    <ul class="timeline">
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6>Pengajuan Bantuan</h6>
                                    <span class="timeline-event-time">#</span>
                                </div>
                                <p>Akun ini belum melakukan pengajuan</p>
                                <div class="media align-items-center" style="padding-bottom: 30px">
                                    <div class="media-body">#</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Plan CardEnds -->
    </div>
    <!-- User Card & Plan Ends -->

     <!-- Basic Horizontal form layout section start -->
     <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Biodata Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-horizontal">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first-name-icon">Nama Lengkap</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather='user-check'></i></span>
                                            </div>
                                            <input type="text" id="first-name-icon" class="form-control" value="{{ $lansia->nama }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-icon">Tempat Lahir</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather='map-pin'></i></span>
                                            </div>
                                            <input type="teks" id="email-id-icon" class="form-control" value="{{ $lansia->tempat_lahir }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first-name-icon">Pekerjaan</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather='activity'></i></span>
                                            </div>
                                            <input type="text" id="first-name-icon" class="form-control" value="{{ $lansia->pekerjaan }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-icon">Tanggal Lahir</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather='calendar'></i></span>
                                            </div>
                                            <input type="email" id="email-id-icon" class="form-control" value="{{ $lansia->tanggal_lahir }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first-name-icon">Pendidikan</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather='globe'></i></span>
                                            </div>
                                            <input type="text" id="first-name-icon" class="form-control" value="{{ $lansia->pendidikan }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-icon">Penghasilan</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather='credit-card'></i></span>
                                            </div>
                                            <input type="email" id="email-id-icon" class="form-control" value="Rp. {{ $lansia->penghasilan }}"disabled>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Akses Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-horizontal">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="fname-icon">Username</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="user"></i></span>
                                                </div>
                                                <input disabled id="fname-icon" class="form-control" name="fname-icon" placeholder="First Name" value="{{ $lansia->user->name }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="email-icon">Email</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="mail"></i></span>
                                                </div>
                                                <input type="email" id="email-icon" class="form-control" value="{{ $lansia->user->email }}" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="contact-icon">Level Akses</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather='layers'></i></span>
                                                </div>
                                                {{-- <input type="text" id="contact-icon" class="form-control" @hasrole('lansia') value="lansia" @else value="another" @endhasrole disabled /> --}}
                                                <input type="text" id="contact-icon" class="form-control" value="{{ $lansia->user->getRoleNames() }}" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12" style="padding-bottom: 20px">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="pass-icon">Password</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="lock"></i></span>
                                                </div>
                                                <input type="password" id="pass-icon" class="form-control" value="adminadmin"disabled/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Horizontal form layout section end -->

</section>
@endsection
