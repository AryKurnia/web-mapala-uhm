<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <span class="brand-text font-weight-light">Mapala STMIK Handayani</span>
        {{-- <img src="{{ asset('assets/dist/img/logo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a class="d-block" onclick="editAdmin({{ Auth::id() }})" href="#">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link {{ (request()->is('admin/master*')) ? 'active' : '' }}"">
              <i class=" nav-icon fas fa-archive"></i>
                        <p>
                            Master Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('anggota') }}"
                                class="nav-link {{ (request()->is('admin/master/anggota')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Anggota</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('perlengkapan') }}"
                                class="nav-link {{ (request()->is('admin/master/perlengkapan')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perlengkapan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('iuran') }}"
                                class="nav-link {{ (request()->is('admin/master/iuran')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Iuran</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link {{ (request()->is('admin/landing*')) ? 'active' : '' }}"">
                    <i class=" nav-icon fas fa-archive"></i>
                        <p>
                            Landing Manager
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('beranda') }}"
                                class="nav-link {{ (request()->is('admin/landing/beranda')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Beranda</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('strukturimage') }}"
                                class="nav-link {{ (request()->is('admin/landing/struktur')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Struktur</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('berita') }}"
                                class="nav-link {{ (request()->is('admin/landing/berita')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Berita</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('ketua') }}"
                                class="nav-link {{ (request()->is('admin/landing/ketua')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ketua</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('Evisimisi') }}"
                                class="nav-link {{ (request()->is('admin/landing/visimisi')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Visi & Misi</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<script>
     function editAdmin(id) {
        $.ajax({
            url: "{{ url('admin/edit') }}",
            data: {
                id_data: id,
            },
            method: 'GET',
            success: function (data) {
                if (data.status) {
                    $('#modal-lg').html('');
                    $("#modal-lg").html(data.html);
                    $("#modal-lg").modal('show', {
                        backdrop: 'true'
                    });
                } else {
                    $('#modal-lg').html('');
                }
            },
            error: function (data) {

            }
        });
    }
</script>
