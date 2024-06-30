@extends('layout/master')

@section('title', 'Anggota')

@section('menu')
    @include('layout/partial/menu/admin')
@endsection

@section('main-content')
<div class="card">
    <div class="card-header text-right">
        <button type="button" class="btn btn-primary px-3" onclick="createUser()">Create User</button>
    </div>
    <div class="card-body table-responsive">
        <table id="user" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nia / Niam</th>
                    <th>Nama Lengkap</th>
                    <th>Angkatan</th>
                    <th>Jurusan</th>
                    <th>Status Anggota</th>
                    <th class="text-center">Detail</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                    <th class="text-center">Reset</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($user as $key => $item)
                <tr>
                    <td>{{  ++$key  }}</td>
                    <td>{{  $item->nia }}</td>
                    <td>{{  $item->anggota->nama }}</td>
                    <td class="text-center">{{  $item->anggota->angkatan }}</td>
                    <td class="text-center">{{  $item->anggota->jurusan }}</td>
                    <td class="text-center">{{  $item->anggota->category }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-info btn-lg" onclick="detailanggota({{ $item->anggota->id }})">
                            <i class="fas fa-users"></i>
                        </button>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-lg" onclick="editanggota({{ $item->id }})">
                            <i class="fas fa-user-edit"></i>
                        </button>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger btn-lg" onclick="deleteanggota({{ $item->id }})"
                            ><i class="fas fa-user-times"></i>
                        </button>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-success btn-lg" onclick="resetPassword({{ $item->id }})"
                            ><i class="fas fa-sync-alt"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr><th colspan="9" class="text-center">Data kosong !</th></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script>
    $(function () {
        $("#user").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });

    function createUser() {
        $.ajax({
            url: "{{ url('admin/master/anggota/formanggota') }}",
            data: {
                csrfmiddlewaretoken: '{{ csrf_field() }}',
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

    function detailanggota(id) {
        $.ajax({
            url: "{{ url('admin/master/anggota/detail') }}",
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

    function editanggota(id) {
        $.ajax({
            url: "{{ url('admin/master/anggota/edit') }}",
            data: {
                /*csrfmiddlewaretoken: '{{ csrf_field() }}',*/
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

    function deleteanggota(id) {
        $.ajax({
            method: "DELETE",
            url: "{{ url('admin/master/anggota/delete') }}",
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: {
                id_data: id,
            },
            dataType: "JSON",
            success: function (response) {
                alert(response.message)
            }
        });
    }

    function resetPassword(id) {
        $.ajax({
            url: "{{ url('admin/master/anggota/resetpassword') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
            },
            method: 'POST',
            success: function (data) {
                if (data.status) {
                    alert(data.message);
                    location.reload()
                } else {
                    alert(data.message);
                }
            },
            error: function (data) {

            }
        });
    }
</script>
@endsection

@section('modals')
    <div class="modal fade" id="modal-lg" aria-hidden="true" style="display: none;">

    </div>
@endsection
