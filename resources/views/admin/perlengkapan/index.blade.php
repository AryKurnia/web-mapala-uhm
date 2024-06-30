@extends('layout/master')

@section('title', 'Anggota')

@section('menu')
    @include('layout/partial/menu/admin')
@endsection

@section('main-content')
<div class="card">
    <div class="card-header text-right">
        <button type="button" class="btn btn-primary px-3" onclick="createPerlengkapan()">Create Perlengkapan</button>
    </div>
    <div class="card-body table-responsive">
        <table id="perlengkapan" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th>Nama</th>
                    <th style="width: 10%">Jumlah</th>
                    <th>Merek</th>
                    <th>Warna</th>
                    <th>Kondisi</th>
                    <th class="text-center">Detail</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($perlengkapan as $key => $item)
                <tr>
                    <td>{{  ++$key  }}</td>
                    <td>{{  $item->nama }}</td>
                    <td class="text-center">{{  $item->jumlah }}</td>
                    <td class="text-center">{{  $item->merek }}</td>
                    <td class="text-center">{{  $item->warna }}</td>
                    <td class="text-center">{{  $item->kondisi }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-info btn-lg" onclick="detailperlengkapan({{ $item->id }})">
                            <i class="fas fa-warehouse"></i>
                        </button>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-lg" onclick="editperlengkapan({{ $item->id }})">
                            <i class="far fa-edit"></i>
                        </button>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger btn-lg" onclick="deleteperlengkapan({{ $item->id }})"
                            ><i class="fas fa-user-times"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr><th colspan="5" class="text-center">Data kosong !</th></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script>
    $(function () {
        $("#perlengkapan").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });

    function createPerlengkapan() {
        $.ajax({
            url: "{{ url('admin/master/perlengkapan/formperlengkapan') }}",
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

    function detailperlengkapan(id) {
        $.ajax({
            url: "{{ url('admin/master/perlengkapan/detail') }}",
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

    function editperlengkapan(id) {
        $.ajax({
            url: "{{ url('admin/master/perlengkapan/edit') }}",
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

    function deleteperlengkapan(id) {
        $.ajax({
            method: "DELETE",
            url: "{{ url('admin/master/perlengkapan/delete') }}",
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
</script>
@endsection

@section('modals')
    <div class="modal fade" id="modal-lg" aria-hidden="true" style="display: none;">

    </div>
@endsection
