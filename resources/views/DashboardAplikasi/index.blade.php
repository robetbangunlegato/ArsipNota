@extends('Dashboard.index')
@section('content')
    <div class="container">
        <div class="card-body row text-center">
            <div class="card mb-4" style="--cui-card-cap-bg: #3b5998">
                <div class="card-header position-relative d-flex justify-content-center align-items-center">
                    <p class="h3 text-center text-white">Selamat datang di aplikasi arsip nota!</p>
                    <div class="chart-wrapper position-absolute top-0 start-0 w-100 h-100">
                        <canvas id="social-box-chart-1" height="90"></canvas>
                    </div>
                </div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="fs-5 fw-semibold">{{ $sum_nota }}</div>
                        <div class="text-uppercase text-medium-emphasis small">Nota Terarsip</div>
                    </div>
                    <div class="vr"></div>
                    <div class="col">
                        <div class="fs-5 fw-semibold">{{ $sum_user }}</div>
                        <div class="text-uppercase text-medium-emphasis small">Pengguna Aplikasi</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
