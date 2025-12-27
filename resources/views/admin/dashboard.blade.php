@extends('layout.master-admin')

@section('title', 'Dashboard')

@section('content')
<div class="page-heading">
    <h3>Dashboard</h3>
</div>

<div class="page-content">
    <div class="row g-4 mt-3">

        <!-- Guru -->
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center justify-content-center 
                                bg-primary bg-opacity-10 text-primary rounded-3"
                        style="width:48px; height:48px;">
                        <i class="bi bi-person-badge fs-4"></i>
                    </div>
                    <div>
                        <small class="text-muted fw-semibold">Jumlah Guru</small>
                        <h3 class="mb-0 fw-bold">{{ $guruCount }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Siswa -->
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center justify-content-center 
                                bg-info bg-opacity-10 text-info rounded-3"
                        style="width:48px; height:48px;">
                        <i class="bi bi-people fs-4"></i>
                    </div>
                    <div>
                        <small class="text-muted fw-semibold">Jumlah Siswa</small>
                        <h3 class="mb-0 fw-bold">{{ $siswaCount }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ekstrakurikuler -->
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center justify-content-center 
                                bg-warning bg-opacity-10 text-warning rounded-3"
                        style="width:48px; height:48px;">
                        <i class="bi bi-award fs-4"></i>
                    </div>
                    <div>
                        <small class="text-muted fw-semibold">Ekstrakurikuler</small>
                        <h3 class="mb-0 fw-bold">{{ $ekstraCount }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Prestasi -->
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center justify-content-center 
                                bg-success bg-opacity-10 text-success rounded-3"
                        style="width:48px; height:48px;">
                        <i class="bi bi-trophy fs-4"></i>
                    </div>
                    <div>
                        <small class="text-muted fw-semibold">Prestasi</small>
                        <h3 class="mb-0 fw-bold">{{ $prestasiCount }}</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Grafik Jumlah Siswa -->
   <!-- Grafik Jumlah Siswa -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-4">

                <!-- Header -->
                <div class="card-header bg-white border-0 d-flex 
                            justify-content-between align-items-center">
                    <h5 class="mb-0 fw-semibold">
                        📊 Statistik Jumlah Siswa Per Kelas
                    </h5>

                    <!-- Dropdown Tahun -->
                    <form method="GET">
                        <select name="tahun"
                                class="form-select form-select-sm"
                                onchange="this.form.submit()">
                            @for ($i = date('Y'); $i >= date('Y') - 5; $i--)
                                <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </form>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <div id="chartGuruSiswa"></div>
                </div>

            </div>
        </div>
    </div>

</div>



@endsection

@push('scripts')


<script>
    var options = {
        chart: {
            type: 'bar',
            height: 360,
            toolbar: { show: false },
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800
            }
        },

        series: [{
            name: 'Jumlah Siswa',
            data: @json($siswaChart)
        }],

        colors: ['#0485e0'],

        plotOptions: {
            bar: {
                borderRadius: 6,
                columnWidth: '45%',
            }
        },

        dataLabels: {
            enabled: false
        },

        xaxis: {
            categories: @json($kategoriChart),
            labels: {
                style: {
                    fontSize: '13px'
                }
            }
        },

        yaxis: {
            labels: {
                style: {
                    fontSize: '13px'
                }
            }
        },

        grid: {
            borderColor: '#f1f1f1',
            strokeDashArray: 4
        },

        tooltip: {
            theme: 'light',
            y: {
                formatter: function (val) {
                    return val + " siswa";
                }
            }
        },

        title: {
            text: 'Jumlah Siswa Per Kelas Tahun {{ $tahun }}',
            align: 'left',
            style: {
                fontSize: '16px',
                fontWeight: '600'
            }
        }
    };

    var chart = new ApexCharts(
        document.querySelector("#chartGuruSiswa"),
        options
    );

    chart.render();
</script>





@endpush
