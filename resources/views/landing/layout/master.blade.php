<!doctype html>
<html class="no-js " lang="en">

<head>
    <!-- Site Meta -->
    @include('landing.layout.partial.meta')
    <title>@yield('title')</title>
    @include('landing.layout.partial.css')
</head>

<body>

    {{-- <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="{{ url('assets/landing_page/images/loader.gif') }}" alt="">
    </div><!-- end loader -->
    <!-- END LOADER --> --}}

    <div id="wrapper">
        @include('landing.layout.partial.nav')

        @yield('content')

        @include('landing.layout.partial.footer')
    </div><!-- end wrapper -->

    <!-- jQuery Files -->
    <script src="{{ url('assets/landing_page/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/landing_page/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/landing_page/js/carousel.js') }}"></script>
    <script src="{{ url('assets/landing_page/js/animate.js') }}"></script>
    <script src="{{ url('assets/landing_page/js/custom.js') }}"></script>
    <!-- VIDEO BG PLUGINS -->
    <script src="{{ url('assets/landing_page/js/videobg.js') }}"></script>
    {{-- <script>
        jQuery(document).ready(function($) {
            var Video_back = new video_background($("#home"), {
                "position": "absolute", //Follow page scroll
                "z-index": "-1",        //Behind everything
                "loop": true,           //Loop when it reaches the end
                // "autoplay": true,       //Autoplay at start
                // "muted": true,          //Muted at start
                // "mp4":"{{ url('assets/landing_page/upload/preview_01.mp4') }}" , //Path to video mp4 format
    // "ogg":"{{ url('assets/landing_page/upload/preview_01.ogg') }}" , //Path to video ogg format
    // "webm":"{{ url('assets/landing_page/upload/preview_01.webm') }}" , //Path to video webm format
    // "video_ratio": 1.7778, // width/height -> If none provided sizing of the video is set to adjust
    "fallback_image": "{{ url('assets/landing_page/upload/blog_01.jpg') }}", //Fallback image path
    "priority": "html5" //Priority for html5 (if set to flash and tested locally will give a flash security error)
    });
    });
    </script> --}}

    @yield('js')
</body>

</html>