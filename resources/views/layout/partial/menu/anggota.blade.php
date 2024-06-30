<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light ">Mapala STMIK Handayani</span>
        {{-- <img src="{{ asset('assets/dist/img/logo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <a href="{{ route('editprofil', Auth::id()) }}">
                    <img src="{{ asset('assets/images/anggota/'.Auth::user()->anggota->image ) }}" class="img-circle elevation-1"
                        alt="User Image">
                </a>
            </div>
            <div class="info">
                <a href="{{ route('editprofil', Auth::id()) }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboardanggota') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('daftaranggota') }}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p class="ml-2">
                            Daftar Anggota
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('daftarperlengkapan') }}" class="nav-link">
                        <i class="fas fa-dolly-flatbed"></i>
                        <p class="ml-2">
                            Daftar Perlengkapan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
