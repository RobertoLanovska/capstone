@extends('layout.master-admin')

@section('title', 'Dashboard')

@section('content')
<div class="page-heading">
    <h3>Dashboard</h3>
</div>

<div class="page-content">
    <div class="row">

        <!-- Card Guru -->
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="text-muted">Jumlah Guru</h6>
                    <h2>{{ $guruCount }}</h2>
                </div>
            </div>
        </div>

        <!-- Card Siswa -->
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="text-muted">Jumlah Siswa</h6>
                    <h2>{{ $siswaCount }}</h2>
                </div>
            </div>
        </div>

        <!-- Card Ekstra -->
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="text-muted">Ekstrakurikuler</h6>
                    <h2>{{ $ekstraCount }}</h2>
                </div>
            </div>
        </div>

        <!-- Card Prestasi -->
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="text-muted">Prestasi</h6>
                    <h2>{{ $prestasiCount }}</h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Grafik Guru & Siswa -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5>Grafik Jumlah Guru & Siswa</h5>
                </div>
                <div class="card-body">
                    <div id="chartGuruSiswa"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
        chart: {
            type: 'bar',
            height: 350
        },
        series: [{
            name: 'Jumlah',
            data: [
                {{ $guruCount }},
                {{ $siswaCount }}
            ]
        }],
        xaxis: {
            categories: ['Guru', 'Siswa']
        }
    };

    var chart = new ApexCharts(
        document.querySelector("#chartGuruSiswa"),
        options
    );
    chart.render();
</script>
@endpush
