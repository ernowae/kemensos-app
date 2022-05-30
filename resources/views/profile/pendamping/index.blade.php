@extends('layouts.app')

@section('content')

<section class="app-user-view">
    <!-- User Card & Plan Starts -->
    <div class="row">
        <!-- User Card starts-->
        <div class="col-xl-12 col-lg-7 col-md-6">
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
                                            <a href="{{ route('profile-pendamping.edit',[$pendamping->id]) }}" class="btn btn-primary">Edit</a>
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

    </div>
    <!-- User Card & Plan Ends -->

</section>
@endsection
