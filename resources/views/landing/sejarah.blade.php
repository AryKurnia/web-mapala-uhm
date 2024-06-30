@extends('landing.layout.master')

@section('title', 'MAPALA STMIK HANDAYANI MAKASSAR')

@section('content')
<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message text-center">
                    <h3>SEJARAH</h3>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end sectio -->
<section class="section gb">
    <div class="container">
        <div class="row" style="color: black;">
            <div class="col-md-6">
                <p>MAPALA STMIK Handayani Makassar merupakan salah satu Unit Kegiatan Mahasiswa (UKM) tingkat perguruan tinggi yang didirikan pada hari minggu, tanggal 23 juni 2001 pada pukul 09:47 WITA. MAPALA STMIK Handayani Makassar merupakan wadah Mahasiswa STMIK Handayani Makassar untuk berkegiatan di alam bebas, peduli terhadap pelestarian lingkungan dan berkontribusi bagi masyarakat. Ide pembentukan organisasi MAPALA STMIK Handayani Makassar ini di cetuskan oleh 6 (enam) pendiri dan di bantu oleh MAPALA STIEM Bongaya.</p>
                <p>Adapun 6 (enam) pendiri MAPALA STMIK Handayani Makassar yaitu:</p>
                <ol type="1">
                    <li>Ridwan Gaffar, S.Kom</li>
                    <li>Sufriadi Azis, S.Kom</li>
                    <li>Alm. Kchrisna F. Finantik, S.Kom</li>
                    <li>Abd. Ali, A.Md</li>
                    <li>Hasanuddin, S.kom</li>
                    <li>Ahmad, S.Kom</li>
                </ol>
            </div>
            <div class="col-md-6">
                <p>MAPALA STMIK Handayani Makassar juga pernah dipimpin oleh beberapa mantan ketua dari tahun ke tahun, diantaranya:</p>
                <ol type="1">
                    @foreach ($data as $item)
                        <li>{{ $item->nama }} ({{ date('Y', strtotime($item->mulai)) }} - {{ date('Y', strtotime($item->akhir)) }})</li>
                    @endforeach
                    {{-- <li>Sufriadi  Azis, S.Kom (2001 -2002)</li> --}}
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection
