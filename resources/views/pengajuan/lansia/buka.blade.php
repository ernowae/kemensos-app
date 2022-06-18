<p class="card-text mb-2">
    <span class="font-weight-bolder">Sesi saat ini sedang angktif </span><span>anda dapat melakukan pengajuan selama sesi sedang pengajuan sedang berlangsung</span>
</p>

<div class="mb-2">
    <a type="button" class="btn btn-warning waves-effect waves-float waves-light" href="{{ route('pengajuan.show', $sesi->id) }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star mr-25"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
        <span>Daftar</span>
    </a>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-header">
                <div>
                    <h3 class="font-weight-bolder mb-0">{{ $sesi->tahun_anggaran }}</h3>
                    <p class="card-text">Anggaran</p>
                </div>
                <div class="avatar bg-light-primary p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather='calendar'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-header">
                <div>
                    <h4 class="font-weight-bolder mb-0">{{ date('d F', strtotime($sesi->mulai)); }}</h4>
                    <p class="card-text">Sesi Mulai</p>
                </div>
                <div class="avatar bg-light-primary p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather='clock'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="font-weight-bolder mb-0">{{ date('d F', strtotime($sesi->selesai)); }}</h2>
                    <p class="card-text">Sesi Berakhir </p>
                </div>
                <div class="avatar bg-light-danger p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather='clock'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-header">
                <div>
                    <h6 class="font-weight-bolder mb-0" id="demo"></h6>
                    <p class="card-text">Waktu Tersisa</p>
                </div>
                <div class="avatar bg-light-warning p-50 m-0">
                    <div class="avatar-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon font-medium-5"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')

<script>
    // Set the date we're counting down to
    var countDownDate = new Date("{{ $sesi->selesai }}").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Output the result in an element with id="demo"
      document.getElementById("demo").innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ";

      // If the count down is over, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
    </script>
@endpush
