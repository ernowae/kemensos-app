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
                                            <h4 class="mb-0">{{ $pendamping->nama }}</h4>
                                            <p class="card-text">Jumlah Lansia yang didampingi :
                                                <span class="text-danger"> {{ $jumlah }} Lansia</span>
                                            </p>


                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <a href="{{ route('pendamping.edit',[$pendamping->id]) }}" class="btn btn-primary">Edit</a>
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
                                    <p class="card-text mb-0">{{ $pendamping->nik }}</p>
                                </div>
                                <div class="d-flex flex-wrap my-50">
                                    <div class="user-info-title">
                                        <i data-feather="check" class="mr-1"></i>
                                        <span class="card-text user-info-title font-weight-bold mb-0">Alamat</span>
                                    </div>
                                    <p class="card-text mb-0 text-wrap">{{ $pendamping->alamat }}</p>
                                </div>
                                <div class="d-flex flex-wrap my-50">
                                    <div class="user-info-title">
                                        <i data-feather="flag" class="mr-1"></i>
                                        <span class="card-text user-info-title font-weight-bold mb-0 text-primary">Wilayah Kerja</span>
                                    </div>
                                    @if ($pendamping->wilayah_id != NULL)
                                    <p class="card-text mb-0 text-primary">{{ $pendamping->wilayah->nama }}</p>
                                    @else
                                    <p class="card-text mb-0 text-danger">Belum ditetapkan</p>
                                    @endif
                                </div>

                                <div class="d-flex flex-wrap">
                                    <div class="user-info-title">
                                        <i data-feather="phone" class="mr-1"></i>
                                        <span class="card-text user-info-title font-weight-bold mb-0">hp</span>
                                    </div>
                                    <p class="card-text mb-0">{{ $pendamping->hp }}</p>
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
                    <span class="badge badge-light-secondary" data-toggle="tooltip" data-placement="top" title="Expiry Date">Bergabung Sejak, <span>{{ $pendamping->created_at }}</span>
                    </span>
                </div>
                <div class="card-body">
                    <ul class="timeline">
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6>Penetapan Pendamping</h6>
                                    <span class="timeline-event-time">#</span>
                                </div>
                                <p>Penambahan Lansia Baru</p>
                                <div class="media align-items-center">
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
                        <h4 class="card-title">Daftar Lansia yang didampingi</h4>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#inlineForm">
                                Tambah
                            </button>
                            <!-- Modal -->
                            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">Tambahkan Lansia ke daftar Pendamping</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form class="form" method="POST" action="{{ route('pendamping.storeLansia') }}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="alert alert-warning" role="alert">
                                                    <div class="alert-body"><strong>Perhatian!</strong> Daftar lansia yang ditampilkan adalah data yang memiliki kesamaan antar alamat lansia dengan wilayah tugas pendamping .</div>
                                                </div>
                                                <label>Pilih Lansia: </label>
                                                <div class="form-group">
                                                    <input type="hidden" name="pendamping" value="{{ $pendamping->id }}">
                                                    <select class="form-control" id="basic-select" name="lansia">
                                                        <option value="">Pilih Lansia :</option>
                                                        @foreach ($data as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($pendamping->wilayah_id != NULL)

                                                    @else
                                                    <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                        <div class="alert-body">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info mr-50 align-middle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                                            <span>Wilayah Kerja <strong>Belum ditetapkan</strong>. Silahkan lengkapi terlebih dahulu.</span>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Daftar list dibawah ini adalah data lansia yang sudah ditetapkan untuk didampingi dalam kegiatan bantuan sosial
                        </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover-animation">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lansia as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->hp }}</td>
                                    <td>
                                        <a>
                                            <form onsubmit="return confirm('Hapus dampingan dari pendamping ini?')" class="form"  method="POST" action="{{ route('pendamping.destroyLansia',[$pendamping->id]) }}">
                                                @csrf
                                                <input type="hidden" value="PUT" name="_method">
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <button type="submit" class="btn btn-outline-danger waves-effect"><i data-feather="trash" class="mr-50"></i></button>
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
                                                <input disabled id="fname-icon" class="form-control" name="fname-icon" placeholder="First Name" value="{{ $pendamping->user->name }}" />
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
                                                <input type="email" id="email-icon" class="form-control" value="{{ $pendamping->user->email }}" disabled/>
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
                                                {{-- <input type="text" id="contact-icon" class="form-control" @hasrole('pendamping') value="pendamping" @else value="another" @endhasrole disabled /> --}}
                                                <input type="text" id="contact-icon" class="form-control" value="{{ $pendamping->user->getRoleNames() }}" disabled />
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
