@extends('landing.layout.master')

@section('title', 'MAPALA STMIK HANDAYANI MAKASSAR')

@section('content')
<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message text-center">
                    <h3>STRUKTUR PENGURUS</h3>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->

<section class="section">
    <div class="container">
        <div class="col-md-12">
            <center>
                @if (isset($data))
                <img src="{{ asset('assets/images/struktur/'.$data->image) }}" style="max-width: 100%;
                height: auto;">
                @else
                <img src="{{ asset('assets/landing_page/images/struktural.png') }}" style="max-width: 100%;
                height: auto;">
                @endif
            </center>
        </div>
    </div>
</section>

<section class="section gb">
    <div class="container">
        <div class="row" style="color: black;">
            <div class="col-md-6">
                <ol type="1">
                    <b>
                        <li>Perlindung</li>
                    </b>
                    <p>Pelindung adalah Ketua STMIK Handayani Makassar yang bertujuan untuk melindungi seluruh komponen organisasi dan memiliki hubungan non structural terhadap organisasi. </p>
                    <b>
                        <li>Penaggung Jawab</li>
                    </b>
                    <p>Penanggung Jawab adalah Ketua III STMIK Handayani yang membidangi kemahasiswaan STMIK Handayani Makassar dan memiliki hubungan secara non structural terhadap organisasi. </p>
                    <b>
                        <li>Dewan Penasehat</li>
                    </b>
                    <p>Dewan penasehat adalah Anggota Kehormatan yang ditunjuk langsung oleh Badan Pengurus yang bertugas sebagai Lembaga Konsultatif dan memiliki hubungan non structural terhadap organisasi.</p>
                    <b>
                        <li>Badan Penelitian, Pengkajian dan Perumus (BP3) </li>
                    </b>
                    <p>Badan Penelitian, Pengkajian dan Perumus (BP3) adalah Badan yang direkomendasikan oleh Badan Pengurus untuk meneliti, mengkaji dan merumuskan pelaksanaan-pelaksanaan pengkaderan dan pengelolaan keuangan organisasi, serta meninjau ulang AD/ART jika dianggap perlu dan memiliki hubungan non structural terhadap Ketua Umum. </p>
                    <b>
                        <li>Ketua Umum</li>
                    </b>
                    <p>Ketua Umum adalah Anggota yang terpilih dalam Musyawarah Besar (MUBES) dan bertanggung jawab atas seluruh aktivitas organisasi. </p>
                    <b>
                        <li>Sekretaris Umum</li>
                    </b>
                    <p>Sekretaris Umum adalah anggota yang bertugas melaksanakan proses kesekretariatan dan memberikan ide-ide dalam membantu merealisasikan program kerja organisasi serta bertanggung jawab secara operasional maupun structural terhadap Ketua Umum.</p>
                    <b>
                        <li>Bendahara Umum</li>
                    </b>
                    <p>Bendahara Umum adalah anggota yang bertugas dalam hal keuangan terutama pengelolahan, pengembangan, memberikan ide-ide dan solusi penambahan kas organisasi serta bertanggung jawab secara operasional maupun structural terhadap Ketua Umum. </p>
                    <b>
                        <li>Ketua I </li>
                    </b>
                    <p>Ketua I adalah anggota yang bertugas membawahi Bidang Pendidikan, Pengembangan intelektual (PPI), Bidang Humas Publikasi, Dokumentasi dan Kreatifitas (HPDK) dan Bidang Lingkungan Hidup (LH) serta bertanggung jawab secara operasional maupun structural terhadap Ketua Umum. </p>
                    <b>
                        <li>Ketua II</li>
                    </b>
                    <p>Ketua II adalah anggota yang membawahi Bidang perlengkapan, Bidang Kesejahteraan Anggota (KESRA) serta bertanggung jawab secara operasional maupun structural terhadap Ketua Umum. </p>
                    <b>
                        <li>Ketua III</li>
                    </b>
                    <p>Ketua III adalah anggota yang membawahi Divisi Gunung Hutan, Divisi Panjat Tebing dan Divisi Penelusuran Gua serta bertanggung jawab secara operasional maupun structural terhadap Ketua Umum.</p>
                    <b>
                        <li>Anggota</li>
                    </b>
                    <p>Anggota adalah Mahasiswa STMIK Handayani Makassar yang telah mengikuti Penerimaan Anggota Baru (PAB) dan dinyatakan lulus oleh Badan Pengurus. </p>
                </ol>
            </div>
            <div class="col-md-6">
                <h3>Bidang Dan Divisi</h3>
                <ol type="8">
                    <b>
                        <li>Bidang Pengembangan, Pendidikan Intelektual (PPI) </li>
                    </b>
                    <p>Bidang Pengembangan, Pendidikan Intelektual (PPI) adalah bidang yang bertanggung jawab terhadap Pendidikan dan Pengembangan Intelektual. </p>
                    <b>
                        <li>Bidang Humas, Publikasi, Dokumentasi dan Komunikasi (HPDK)</li>
                    </b>
                    <p>Bidang Humas, Publikasi, Dokumentasi dan Komunikasi (HPDK) adalah bidang yang bertugas untuk mempererat tali persaudaraan sesama anggota MAPALA STMIK Handayani Makassar, instansi terkait, maupun hubungan dengan masyarakat, serta memelihara, mendokumentasikan dan mempublikasikan kegiatan-kegiatan organisasi untuk diketahui serta berusaha mengembangkan kreatifitas untuk menyalurkan bakat anggota. </p>
                    <b>
                        <li>Bidang Lingkungan Hidup (LH)</li>
                    </b>
                    <p>Bidang Lingkungan Hidup (LH) adalah bertugas melakukan pengkajian, upaya konservasi, pengawasan kebijakan pemerintah terhadap lingkungan hidup dan aktif dalam menanggapi isu-isu lingkungan. </p>
                    <b>
                        <li>Bidang Perlengkapan</li>
                    </b>
                    <p>Bidang Perlengkapan adalah bidang yang bertanggung jawab dalam melengkapi, menginventariskan serta memelihara dan mendata sarana dan prasarana organisasi. </p>
                    <b>
                        <li>Bidang Kesejahteraan Anggota (KESRA)</li>
                    </b>
                    <p>Bidang Kesejahteraan Anggota (KESRA) adalah bidang yang bertugas dalam hal pengaktifan, pengontrolan dan peningkatan sumber daya anggota. </p>
                    <b>
                        <li>Divisi Gunung Hutan</li>
                    </b>
                    <p>Divisi Gunung Hutan adalah divisi yang mewadahi aktifitas anggota dan bertanggung jawab atas peningkatan sumber daya anggota dalam hal kemampuan khususnya Gunung Hutan. </p>
                    <b>
                        <li>Divisi Panjat Tebing</li>
                    </b>
                    <p>Divisi Panjat Tebing adalah divisi yang mewadahi aktivitas anggota dan bertanggung jawab atas peningkatan sumber daya anggota dalam kemampuan khususnya Panjat Tebing. </p>
                    <b>
                        <li>Divisi Penelusuran Gua. </li>
                    </b>
                    <p>Divisi Penulusuran Gua adalah divisi yang mewadahi aktifitas anggota dan bertanggung jawab atas peningkatan sumber daya anggota dalam hal kemampuan khususnya Penelusuran Gua. </p>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection