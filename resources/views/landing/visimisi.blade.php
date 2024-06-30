@extends('landing.layout.master')

@section('title', 'MAPALA STMIK HANDAYANI MAKASSAR')

@section('content')
<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message text-center">
                    <h3>VISI & MISI</h3>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->
<section class="section gb" style="min-height: 100%;">
    <div class="container">
        <div class="row" style="color: black;">
            <div class="col-md-6">
                <h2>Visi</h2>
                <p><i>"{{ $visi->visimisi }}"</i></p>
            </div>
            <div class="col-md-6">
                <h2>Misi</h2>
                <ol type="1">
                    @foreach ($misi as $item)
                        <li>{{ $item->visimisi }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection
