@extends('layout.master')

@section('title', 'Dashboard')

@section('menu')
    @include('layout/partial/menu/anggota')
@endsection

@section('main-content')
<div class="card">
    <div class="card-header">
        <h5 class="m-0">Perlengkapan</h5>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th class="text-center">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($perlengkapan as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->kondisi }}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-lg btn-block" onclick="detailperlengkapan({{ $item->id }})">
                            <i class="fas fa-warehouse"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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

    function detailperlengkapan(id) {
        $.ajax({
            url: "{{ route('detailperlengkapan') }}",
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
  </script>
@endsection

@section('modals')
    <div class="modal fade" id="modal-lg" aria-hidden="true" style="display: none;">

    </div>
@endsection
