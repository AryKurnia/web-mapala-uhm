<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Begin # DIV Form -->
            <div id="div-forms">
                <form id="login-form">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="flaticon-add" aria-hidden="true"></span>
                    </button>
                    <div class="modal-body">
                        <input class="form-control" type="text" placeholder="What you are looking for?" required>
                    </div>
                </form><!-- End # Login Form -->
            </div><!-- End # DIV Form -->
        </div>
    </div>
</div>
<!-- END # MODAL LOGIN -->

<header class="header">
    <div class="container">
        <nav class="navbar navbar-default yamm">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo-normal">
                    <a class="navbar-brand" href="#"><img src="{{ asset('assets/landing_page/images/logo.png') }}" alt=""></a>
                </div>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="dropdown hassubmenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tentang <span class="fa fa-angle-down"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('sejarah') }}" style="color: white;">Sejarah</a></li>
                            <li><a href="{{ route('visimisi') }}" style="color: white;">Visi & Misi</a></li>
                            <li><a href="{{ route('struktur') }}" style="color: white;">Struktur</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('landingberita') }}">Berita</a></li>
                    <li><a href="{{ route('kontak') }}">Kontak</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </nav><!-- end navbar -->
    </div><!-- end container -->
</header>
