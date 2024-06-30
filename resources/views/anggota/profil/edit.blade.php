@extends('layout.master')

@section('title', 'Dashboard')

@section('menu')
    @include('layout/partial/menu/anggota')
@endsection

@section('main-content')
<div class="card">
    <div class="card-header">
        <h5 class="m-0">PROFIL</h5>
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
                                    src="{{ asset('assets/images/anggota/'.$profil->image) }}" alt="User profile picture" onclick="viewFoto({{ $profil->id }})">
                            </div>

                            <h3 class="profile-username text-center">{{ $profil->nama }}</h3>

                            <p class="text-muted text-center">{{ $profil->category }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>NIA / NIAM</b> <a class="float-right">{{ $profil->user->nia }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Nama Lapangan</b> <a class="float-right">{{ $profil->user->name }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Angkatan</b> <a class="float-right">{{ $profil->angkatan }}</a>
                                </li>
                            </ul>

                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-lgf"><b>Edit Foto</b></button>
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-lgg"><b>Edit Password</b></button>
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

                            <p class="text-muted">{{ $profil->alamat }}</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i>Jurusan</strong>
                            @if ($profil->jurusan == 'SK')
                            <p class="text-muted">Sistem Komputer</p>
                            @endif
                            @if ($profil->jurusan == 'TI')
                            <p class="text-muted">Teknik Informatika</p>
                            @endif
                            @if ($profil->jurusan == 'SI')
                            <p class="text-muted">Sistem Informasi</p>
                            @endif
                            @if ($profil->jurusan == 'MI')
                            <p class="text-muted">Manajement Informatika</p>
                            @endif
                            @if ($profil->jurusan == 'KA')
                            <p class="text-muted">Komputer Akuntansi</p>
                            @endif

                            <hr>

                            <strong><i class="far fa-file-alt mr-2"></i>Keterangan</strong>

                            <p class="text-muted">{{ $profil->ket}}</p>

                            <hr>

                            <strong><i class="fas fa-phone-alt mr-2"></i>No. HP</strong>

                            <p class="text-muted">{{ $profil->no_telp}}</p>

                            <hr>

                            <strong><i class="fas fa-diagnoses mr-2"></i>Attribute</strong>

                            <p class="text-muted">
                                @forelse ($profil->atribut as $item)
                                <span>{{ $item->identitas }},</span>
                                @empty
                                <span>Tidak Memiliki Attribute</span>
                                @endforelse
                            </p>

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
                                        data-toggle="tab">Edit Profil</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <form id="update">
                                        @csrf
                                        <input type="hidden" name="id_data" value="{{ $profil->id }}">
                                        <div class="form-group">
                                            <label for="">Nama Lengkap : </label>
                                            <input type="text" class="form-control" name="nama" placeholder="nama" value="{{ $profil->nama }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Lapangan : </label>
                                            <input type="text" class="form-control" name="username" placeholder="nama lapangan" value="{{ $profil->user->name }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Angkatan : </label>
                                            <input type="text" class="form-control" name="angkatan" placeholder="angkatan" value="{{ $profil->angkatan }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat :</label>
                                            <textarea class="form-control" rows="3" name="alamat" placeholder="alamat" disabled>{{ $profil->alamat }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan :</label>
                                            <textarea class="form-control" rows="3" name="keterangan" placeholder="keterangan" disabled>{{ $profil->ket }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">No. HP : </label>
                                            <input type="text" class="form-control" name="nohp" placeholder="nomor Handphone" value="{{ $profil->no_telp }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $profil->user->email }}" disabled>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="button" class="btn btn-warning px-5" onclick="Edit()"><i class="fas fa-pencil-alt"></i></button>
                                            <button type="submit" class="btn btn-success px-5"><i class="fas fa-save"></i></button>
                                        </div>
                                    </form>
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
<div class="modal fade" id="modal-lgf">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Foto</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="updatefoto">
                @csrf
                <div class="form-group">
                    <label for="exampleInputFile">Foto :</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text">Update</button>
                        </div>
                    </div>
                </div>
                {{-- <div class="text-right">
                </div> --}}
            </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-lgg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="updatepassword">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label>Password :</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    {{-- <div class="text-right">
                    </div> --}}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@section('js')
<script>
    function Edit() {
        $('.form-control').prop("disabled", false); // Element(s) are now enabled.
    }

    function viewFoto(id) {
        $.ajax({
            url: "{{ url('anggota/viewfoto') }}",
            data: {
                csrfmiddlewaretoken: '{{ csrf_field() }}',
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

    $(document).ready(function() {
        $('#updatefoto').submit(function(e){
            e.preventDefault();
            $form = $(this)
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('updatefoto') }}",
                type: 'POST',
                data: formData,
                success: function (response) {
                    if (response.status == true) {
                        alert(response.message)
                        location.reload(true);
                    } else {
                        alert(response.message)
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });

        $('#updatepassword').submit(function(e){
            e.preventDefault();
            $form = $(this)
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('updatepassword') }}",
                type: 'POST',
                data: formData,
                success: function (response) {
                    if (response.status == true) {
                        alert(response.message)
                        location.reload(true);
                    } else {
                        alert(response.message)
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });

        $('#update').submit(function(e){
            e.preventDefault();
            $form = $(this)
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('updateprofil') }}",
                type: 'POST',
                data: formData,
                success: function (response) {
                    console.log(response)
                    if (response.status == true) {
                        alert(response.message)
                        $('.form-control').prop("disabled", true);
                    } else {
                        alert(response.message)
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    });
</script>
@endsection

@section('modals')
<div class="modal fade" id="modal-lg" aria-hidden="true" style="display: none;">

</div>
@endsection
