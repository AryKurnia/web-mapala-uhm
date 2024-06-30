@extends('landing.layout.master')

@section('title', 'MAPALA STMIK HANDAYANI MAKASSAR')

@section('content')
<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message text-center">
                    <h3></h3>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->

<section class="section">
    <div class="container">
        <div class=" ">
            <div class="row">
                <div class="col-md-12 shop-media">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="image-wrap entry">
                                <img src="{{ asset('assets/images/beritas/'.$data->image) }}" alt="" class="img-responsive" style="width: 500px; position: relative; float: left; margin-bottom: 20px;margin-right: 20px;">
                                <h3>{{ $data->title }}</h3>
                                <h5 style="color: black; position: relative; text-align: justify;"> {!! $data->description !!} </h5>
                            </div><!-- end desc -->
                        </div><!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="shop-meta">
                                <ul class="list-inline">
                                    <li>{{ $data->created_at->format('j M Y') }}</li>
                                </ul>
                            </div><!-- end shop meta -->
                        </div>
                    </div>
                    {{-- <div class="content boxed-comment clearfix">
                <div class="content boxed-comment clearfix">
                    <h3 class="small-title">Tinggalkan Komentar</h3>
                    <form class="big-contact-form">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="website" placeholder="Website">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <textarea placeholder="Komentar Kamu" class="form-control"></textarea>
                            <button class="btn btn-primary" type="submit">SEND COMMENT</button>
                        </div>
                    </form>
                </div><!-- end content -->
            </div> --}}

                </div><!-- end row -->

            </div><!-- end boxed -->
</section>
@endsection