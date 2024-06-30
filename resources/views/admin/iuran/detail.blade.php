@extends('layout/master')

@section('title', 'Anggota')

@section('menu')
    @include('layout/partial/menu/admin')
@endsection

@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="text-right">
            <button type="button" class="btn btn-primary" onclick="createIuranUser({{ $id }})">Create Iuran
                User</button>
        </div>
        <div id="tabeldetailiuran">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Table Iuran User</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="user" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nia / Niam</th>
                                <th>Nama</th>
                                <th style="width: 40px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($detail as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->nia }}</td>
                                <td>{{ $value->anggota->nama }}</td>
                                <td>
                                    <button type="button" class="btn btn-block btn-info"
                                        onclick="detailIuranUser({{ $value->id }},{{ $iuran->id }})"><i
                                            class="fas fa-wallet"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <th colspan="4">data kosong !</th>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                {{-- <div class="card-footer clearfix">
                    {{ $detail->links() }}
                </div> --}}
            </div>
        </div>
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

    function createIuranUser(id) {
        $.ajax({
            url: "{{ url('admin/master/iuran/form-iuran-user') }}",
            data: {
                csrfmiddlewaretoken: '{{ csrf_field() }}',
                id_iuran: id,
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

    function detailIuranUser(idu, idi) {
        $.ajax({
            url: "{{ url('admin/master/iuran/detail-iuran-user') }}",
            data: {
                csrfmiddlewaretoken: '{{ csrf_field() }}',
                id_user: idu,
                id_iuran: idi,
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
@endsection

@section('modals')
    <div class="modal fade" id="modal-lg" aria-hidden="true" style="display: none;">

    </div>
@endsection
