@extends('layout.master')

@section('title', 'Dashboard')

@section('menu')
    @include('layout/partial/menu/anggota')
@endsection

@section('main-content')
<div class="card">
    <div class="card-header">
        <h5 class="m-0">Detail Anggota</h5>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('assets/images/anggota/'.$user->image) }}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $user->nama }}</h3>

                            <p class="text-muted text-center">{{ $user->category }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Nia / Niam</b> <a class="float-right">{{ $user->user->nia }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Nama Lapangan</b> <a class="float-right">{{ $user->user->name }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Angkatan</b> <a class="float-right">{{ $user->angkatan }}</a>
                                </li>
                            </ul>

                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-lgg"><b>Lihat Foto</b></button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                                Sekolah Tinggi Manajement Informatika dan Komputer Handayani
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i>Alamat</strong>

                            <p class="text-muted">{{ $user->alamat }}</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i>Jurusan</strong>
                            @if ($user->jurusan == 'SK')
                            <p class="text-muted">Sistem Komputer</p>
                            @endif
                            @if ($user->jurusan == 'TI')
                            <p class="text-muted">Teknik Informatika</p>
                            @endif
                            @if ($user->jurusan == 'SI')
                            <p class="text-muted">Sistem Informasi</p>
                            @endif
                            @if ($user->jurusan == 'MI')
                            <p class="text-muted">Manajement Informatika</p>
                            @endif
                            @if ($user->jurusan == 'KA')
                            <p class="text-muted">Komputer Akuntansi</p>
                            @endif

                            <hr>

                            <strong><i class="far fa-file-alt mr-2"></i>Keterangan</strong>

                            <p class="text-muted">{{ $user->ket}}</p>

                            <hr>

                            <strong><i class="fas fa-phone-alt mr-2"></i>No. HP</strong>

                            <p class="text-muted">{{ $user->no_telp}}</p>

                            <hr>

                            <strong><i class="fas fa-diagnoses mr-2"></i>Attribute</strong>

                            <p class="text-muted">
                                @forelse ($user->atribut as $item)
                                <span>{{ $item->identitas }},</span>
                                @empty
                                <span>Tidak Memiliki Attribute</span>
                                @endforelse
                            </p>

                            <hr>

                            <strong><i class="fas fa-user-alt-slash mr-2 mb-2"></i>Status</strong>

                            @if ($user->user->is_active == 1)
                                <p class="text-muted">Aktif</p>
                            @else
                                <p class="text-muted">Tidak Aktif</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                        data-toggle="tab">Iuran</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Periode</th>
                                                <th>Total Iuran</th>
                                                <th>Jumlah Pembayaran</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($iuran as $key => $item)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ date('Y', strtotime($item->tahun)) }} - {{ date('Y', strtotime($item->akhir)) }}</td>
                                                    <td>Rp {{ number_format($item->jumlah,2,',','.') }}</td>
                                                    @forelse ($item->users as $jp)
                                                    <td>Rp {{ number_format($jp->pivot->where('user_id', $jp->id)->where('iuran_id', $item->id)->sum('bayar'),2,',','.') }}</td>
                                                    @break
                                                    @empty
                                                    <td>Rp 0</td>
                                                    @endforelse
                                                    @forelse ($item->users as $value)
                                                        @if ($value->pivot->where('user_id', $value->id)->where('iuran_id', $item->id)->sum('bayar') >= $item->jumlah)
                                                            <td>Lunas</td>
                                                            @break
                                                        @else
                                                            <td>Belum Lunas</td>
                                                            @break
                                                        @endif
                                                    @empty
                                                        <td>Belum Lunas</td>
                                                    @endforelse
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>
<div class="modal fade" id="modal-lgg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Foto Anggota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('assets/images/anggota/'.$user->image) }}" alt="perlengkapan"
                class="img-fluid">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@section('js')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
</script>
@endsection
