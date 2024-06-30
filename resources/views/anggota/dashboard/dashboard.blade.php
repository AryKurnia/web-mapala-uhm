@extends('layout.master')

@section('title', 'Dashboard')

@section('menu')
    @include('layout/partial/menu/anggota')
@endsection

@section('main-content')
<div class="container-fluid">
    <h5>Nama : {{ Auth::user()->anggota->nama }}, {{ Auth::user()->nia }}-{{ Auth::user()->anggota->category }}</h4>
</div>
<div class="row mt-4">
    <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalperlengkapan }}</h3>
                <p>Perlengkapan</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('daftarperlengkapan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    {{-- <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Iuran (Tahun)</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div> --}}
    <!-- ./col -->
    <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $totalanggota }}</h3>

                <p>Anggota</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('daftaranggota') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-12 col-12">
        <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Statistik</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        var donutData = {
            labels: [
                'Pendiri',
                'Istimewa',
                'Kehormatan',
                'Penuh',
                'Muda',
            ],
            datasets: [{
                data: [{{ $pendiri }}, {{ $istimewa }}, {{ $kehormatan }}, {{ $penuh }}, {{ $muda }}],
                backgroundColor: ['#e74c3c', '#3498db', '#f39c12', '#2ecc71', '#f1c40f'],
            }]
        }
        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData        = donutData;
        var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
        })
    });
</script>
@endsection
