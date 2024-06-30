@extends('landing.layout.master')

@section('title', 'STMIK HANDAYANI MAKASSAR')

@section('content')
<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message text-center">
                    <h3>BERITA</h3>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->
<section class="section gb nopadtop">
    <div class="container">
        <div class="boxed">
            <div class="row">
                <div class="col-md-8" id="berita">
                    <div class="row blog-grid">
                        @forelse ($data as $item)
                        <div class="col-md-6">
                            <div class="course-box">
                                <div class="image-wrap entry">
                                    <img src="{{ asset('assets/images/beritas/'.$item->image) }}" alt="gambar berita" class="imageberita">
                                </div><!-- end image-wrap -->
                                <div class="course-details">
                                    <h4 style="height: 55px; overflow: hidden; text-overflow: ellipsis;">
                                        <a href="{{ route('landingdetailberita', $item->id) }}" title="">{{ $item->title }}</a>
                                    </h4>
                                    <h5 style="height: 80px; overflow: hidden; text-overflow: ellipsis;">{!! $item->description !!}</h5>
                                </div><!-- end details -->
                                <div class="course-footer clearfix">
                                    <div class="pull-left">
                                        <ul class="list-inline">
                                            <li><span style="padding: 5px; background-color: green; color: white; font-size: 12px;">{{ $item->category }}</span></li>
                                            <li><a href="#"><i class="fa fa-clock-o"></i>{{ $item->created_at->diffForHumans() }}</a></li>
                                        </ul>
                                    </div><!-- end left -->
                                </div><!-- end footer -->
                            </div><!-- end box -->
                        </div><!-- end col -->
                        @empty
                        <div class="col-md-12">
                            <h3 class="text-center">berita kosong !</h3>
                        </div>
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{ $data->links() }}
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->

                <div class="sidebar col-md-4">
                    <div class="widget clearfix">
                        <h3 class="widget-title">Kategori</h3>
                        <div class="post-widget">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0 kategori"><a href="{{ route('beritakegiatan') }}">Kegiatan</a></h5>
                                    <h5 class="mt-0 kategori"><a href="{{ route('beritafeature') }}">Feature</a></h5>
                                    <h5 class="mt-0 kategori"><a href="{{ route('beritaopini') }}">Opini</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget clearfix">
                        <h3 class="widget-title">Pos-pos Terbaru</h3>
                        <div class="post-widget" id="hotberita">

                        </div>
                    </div><!-- end widget -->

                    <div class="widget clearfix">
                        <h3 class="widget-title">Arsip</h3>
                        <div class="post-widget">
                            <div class="media">
                                <div class="media-body">
                                    <select class="form-control" onchange="month()">
                                        <option value="" class="form-control">Pilih Bulan</option>
                                        <option value="" class="form-control" id="jan">Januari</option>
                                        <option value="" class="form-control" id="feb">Februari</option>
                                        <option value="" class="form-control" id="mar">Maret</option>
                                        <option value="" class="form-control" id="apl">April</option>
                                        <option value="" class="form-control" id="mei">Mei</option>
                                        <option value="" class="form-control" id="jun">juni</option>
                                        <option value="" class="form-control" id="jul">Juli</option>
                                        <option value="" class="form-control" id="agt">Agustus</option>
                                        <option value="" class="form-control" id="sep">September</option>
                                        <option value="" class="form-control" id="okt">Oktober</option>
                                        <option value="" class="form-control" id="nov">November</option>
                                        <option value="" class="form-control" id="des">Desember</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- end sidebar -->
            </div><!-- end row -->
        </div><!-- end boxed -->
    </div><!-- end container -->
</section>

@endsection

@section('js')
<script>
    $(document).ready(function() {
        loadHotBerita()
    });

    function month(page) {
        if ($("#jan").is(":selected")) {
            $.ajax({
                url: "{{ url('berita/mont') }}?page=" + page + "",
                data: {
                    month: '01',
                },
                method: 'GET',
                success: function(data) {
                    if (data.status) {
                        $("#berita").html(" ");
                        $("#berita").html(data.html);
                    } else {
                        $("#berita").html("");
                    }
                },
                error: function(data) {}
            });
        } else if ($("#feb").is(":selected")) {
            $.ajax({
                url: "{{ url('berita/mont') }}?page=" + page + "",
                data: {
                    month: '02',
                },
                method: 'GET',
                success: function(data) {
                    if (data.status) {
                        $("#berita").html(" ");
                        $("#berita").html(data.html);
                    } else {
                        $("#berita").html("");
                    }
                },
                error: function(data) {}
            });
        } else if ($("#mar").is(":selected")) {
            $.ajax({
                url: "{{ url('berita/mont') }}?page=" + page + "",
                data: {
                    month: '03',
                },
                method: 'GET',
                success: function(data) {
                    if (data.status) {
                        $("#berita").html(" ");
                        $("#berita").html(data.html);
                    } else {
                        $("#berita").html("");
                    }
                },
                error: function(data) {}
            });
        } else if ($("#apl").is(":selected")) {
            $.ajax({
                url: "{{ url('berita/mont') }}?page=" + page + "",
                data: {
                    month: '04',
                },
                method: 'GET',
                success: function(data) {
                    if (data.status) {
                        $("#berita").html(" ");
                        $("#berita").html(data.html);
                    } else {
                        $("#berita").html("");
                    }
                },
                error: function(data) {}
            });
        } else if ($("#mei").is(":selected")) {
            $.ajax({
                url: "{{ url('berita/mont') }}?page=" + page + "",
                data: {
                    month: '05',
                },
                method: 'GET',
                success: function(data) {
                    if (data.status) {
                        $("#berita").html(" ");
                        $("#berita").html(data.html);
                    } else {
                        $("#berita").html("");
                    }
                },
                error: function(data) {}
            });
        } else if ($("#jun").is(":selected")) {
            $.ajax({
                url: "{{ url('berita/mont') }}?page=" + page + "",
                data: {
                    month: '06',
                },
                method: 'GET',
                success: function(data) {
                    if (data.status) {
                        $("#berita").html(" ");
                        $("#berita").html(data.html);
                    } else {
                        $("#berita").html("");
                    }
                },
                error: function(data) {}
            });
        } else if ($("#jul").is(":selected")) {
            $.ajax({
                url: "{{ url('berita/mont') }}?page=" + page + "",
                data: {
                    month: '07',
                },
                method: 'GET',
                success: function(data) {
                    if (data.status) {
                        $("#berita").html(" ");
                        $("#berita").html(data.html);
                    } else {
                        $("#berita").html("");
                    }
                },
                error: function(data) {}
            });
        } else if ($("#agt").is(":selected")) {
            $.ajax({
                url: "{{ url('berita/mont') }}?page=" + page + "",
                data: {
                    month: '08',
                },
                method: 'GET',
                success: function(data) {
                    if (data.status) {
                        $("#berita").html(" ");
                        $("#berita").html(data.html);
                    } else {
                        $("#berita").html("");
                    }
                },
                error: function(data) {}
            });
        } else if ($("#sep").is(":selected")) {
            $.ajax({
                url: "{{ url('berita/mont') }}?page=" + page + "",
                data: {
                    month: '09',
                },
                method: 'GET',
                success: function(data) {
                    if (data.status) {
                        $("#berita").html(" ");
                        $("#berita").html(data.html);
                    } else {
                        $("#berita").html("");
                    }
                },
                error: function(data) {}
            });
        } else if ($("#okt").is(":selected")) {
            $.ajax({
                url: "{{ url('berita/mont') }}?page=" + page + "",
                data: {
                    month: '10',
                },
                method: 'GET',
                success: function(data) {
                    if (data.status) {
                        $("#berita").html(" ");
                        $("#berita").html(data.html);
                    } else {
                        $("#berita").html("");
                    }
                },
                error: function(data) {}
            });
        } else if ($("#nov").is(":selected")) {
            $.ajax({
                url: "{{ url('berita/mont') }}?page=" + page + "",
                data: {
                    month: '11',
                },
                method: 'GET',
                success: function(data) {
                    if (data.status) {
                        $("#berita").html(" ");
                        $("#berita").html(data.html);
                    } else {
                        $("#berita").html("");
                    }
                },
                error: function(data) {}
            });
        } else if ($("#des").is(":selected")) {
            $.ajax({
                url: "{{ url('berita/mont') }}?page=" + page + "",
                data: {
                    month: '12',
                },
                method: 'GET',
                success: function(data) {
                    if (data.status) {
                        $("#berita").html(" ");
                        $("#berita").html(data.html);
                    } else {
                        $("#berita").html("");
                    }
                },
                error: function(data) {}
            });
        }
    }

    function loadHotBerita() {
        $.ajax({
            url: "{{ url('berita/hot') }}",
            data: {},
            method: 'GET',
            success: function(data) {
                if (data.status) {
                    $("#hotberita").html(data.html);
                } else {
                    $("#hotberita").html("");
                }
            },
            error: function(data) {}
        });
    }
</script>
@endsection