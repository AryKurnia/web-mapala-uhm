@extends('landing.layout.master')

@section('title', 'MAPALA STMIK HANDAYANI MAKASSAR')

@section('content')
<section id="home" class="video-section js-height-full" style="max-height: 500px; background-image: url(assets/landing_page/images/picture/blog_01.jpg); background-position:center; background-size:cover; background-repeat: no-repeat;">
    <div class="overlay"></div>
    <div class="home-text-wrapper relative container">
        <div class="home-message" style="text-align: left;">
            <p>MAPALA STMIK HANDAYANI<br> MAKASSAR</p>
            <small>MAPALA STMIK Handayani Makassar merupakan salah satu Unit Kegiatan Mahasiswa (UKM) tingkat perguruan tinggi yang didirikan pada hari minggu, tanggal 23 juni 2001 pada pukul 09:47 WITA . . . </small>
            <div class="btn-wrapper">
                <div class="text-left">
                    <a href="{{ route('sejarah') }}" class="btn wow slideInLeft">Selengkapnya</a>
                </div>
            </div><!-- end roww -->
        </div>
    </div>
    <div class="slider-bottom">
    </div>
</section>

<section class="section gb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Divisi</h3>
        </div><!-- end title -->
        <div class="col-md-12 text-center">
            <a href="" class="divisi" data-toggle="modal" data-target="#exampleModalCenter1"><img src="{{ asset('assets/landing_page/images/divisi/div-01.png') }}" alt="" class="img"></a>
            <a href="" class="divisi" data-toggle="modal" data-target="#exampleModalCenter2"><img src="{{ asset('assets/landing_page/images/divisi/div-02.png') }}" alt="" class="img"></a>
            <a href="" class="divisi" data-toggle="modal" data-target="#exampleModalCenter3"><img src="{{ asset('assets/landing_page/images/divisi/div-03.png') }}" alt="" class="img"></a>
        </div>
    </div>
</section>
<div class="modal fade" style="top: 0; background-color: white;" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" style="outline: none;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <h2 class="text-danger">+</h2>
                    </span>
                </button>
                <br>
            </div>
            <div class="modal-body">
                <center style="color: black;">
                    <img style="width: 100px;" src="{{ ('assets/landing_page/images/divisi/1.png') }}" alt="">
                    <h2 class="modal-title" id="exampleModalLongTitle">PANJAT TEBING</h2>
                    {!! $panjattebing->description !!}
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade " style="top: 0; background-color: white;" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" style="outline: none;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <h2 class="text-danger">+</h2>
                    </span>
                </button>
                <br>
            </div>
            <div class="modal-body">
                <center style="color: black;">
                    <img style="width: 100px;" src="{{ ('assets/landing_page/images/divisi/2.png') }}" alt="">
                    <h2 class="modal-title" id="exampleModalLongTitle">GUNUNG HUTAN</h2>
                    {!! $gununghutan->description !!}

                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade " style="top: 0; background-color: white;" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" style="outline: none;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <h2 class="text-danger">+</h2>
                    </span>
                </button>
                <br>
            </div>
            <div class="modal-body">
                <center style="color: black;">
                    <img style="width: 100px;" src="{{ ('assets/landing_page/images/divisi/3.png') }}" alt="">
                    <h2 class="modal-title" id="exampleModalLongTitle">SUSUR GUA</h2>
                    {!! $susugua->description !!}
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message text-center">
                    <h3>TUHAN ALAM DAN RASA</h3>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->

<section class="section gb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Berita</h3>
        </div><!-- end title -->

        <div class="row">
            @forelse ($berita as $item)
            <div class="col-lg-4 col-md-12" style="max-height: 550px">
                <div class="blog-box">
                    <div class="image-wrap entry">
                        <img src="{{ asset('assets/images/beritas/'.$item->image) }}" alt="gambar berita" class="img-responsive">
                    </div><!-- end image-wrap -->
                    <div class="blog-desc" style="max-height: 250px; position: relative;">
                        <span style="padding: 5px; background-color: green; color: white; font-size: 12px;">{{ $item->category }}</span>
                        <h4 style="height: 30px; white-space: nowrap; overflow: hidden; text-overflow: clip;">
                            <a href="{{ route('landingdetailberita', $item->id) }}">{{ $item->title }}</a>
                        </h4>
                        <h5 style="height: 85px; overflow : hidden; text-overflow:ellipsis;">
                            <span>{!! $item->description !!}</span>
                        </h5>
                    </div><!-- end blog-desc -->
                    <div class="post-meta" style="position: relative; background-color: white">
                        <ul class="list-inline">
                            <li><a href="#">{{ $item->created_at->diffForHumans() }}</a></li>
                            <li><a href="#">by Admin</a></li>
                        </ul>
                    </div><!-- end post-meta -->
                </div><!-- end blog -->
            </div><!-- end col -->
            @empty

            @endforelse

            {{-- <div class="col-lg-4 col-md-12">
                <div class="blog-box">
                    <div class="image-wrap entry">
                        <img src="{{ asset('assets/landing_page/upload/blog_01.jpg') }}" alt="" class="img-responsive">
        </div><!-- end image-wrap -->

        <div class="blog-desc">
            <span style="padding: 5px; background-color: green; color: white; font-size: 12px;">Feature</span>
            <h4><a href="detail.html">The most suitable web design & development tutorials</a></h4>
            <p>Sed suscipit neque in erat posuere tristique aliquam porta vestibulum. Cras placerat tincidunt. </p>
        </div><!-- end blog-desc -->

        <div class="post-meta">
            <ul class="list-inline">
                <li><a href="#">20 March 2017</a></li>
                <li><a href="#">by WP Destek</a></li>
                <li><a href="#">11 Share</a></li>
            </ul>
        </div><!-- end post-meta -->
    </div><!-- end blog -->
    </div><!-- end col -->

    <div class="col-lg-4 col-md-12">
        <div class="blog-box">
            <div class="image-wrap entry">
                <img src="{{ asset('assets/landing_page/upload/blog_01.jpg') }}" alt="" class="img-responsive">
            </div><!-- end image-wrap -->

            <div class="blog-desc">
                <span style="padding: 5px; background-color: green; color: white; font-size: 12px;">Opini</span>
                <h4><a href="detail.html">Design for all mobile devices! This is name "responsive"</a></h4>
                <p>Suspendisse scelerisque ex ac mattis molestie vel enim ut massa placerat faucibus sed ut dui vivamus. </p>
            </div><!-- end blog-desc -->

            <div class="post-meta">
                <ul class="list-inline">
                    <li><a href="#">19 March 2017</a></li>
                    <li><a href="#">by WP Destek</a></li>
                    <li><a href="#">44 Share</a></li>
                </ul>
            </div><!-- end post-meta -->
        </div><!-- end blog -->
    </div><!-- end col --> --}}
    </div><!-- end row -->
    <hr class="invis">
    </div><!-- end container -->
</section>
@endsection