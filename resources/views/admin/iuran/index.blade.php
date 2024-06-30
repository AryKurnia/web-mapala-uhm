@extends('layout/master')

@section('title', 'Anggota')

@section('menu')
    @include('layout/partial/menu/admin')
@endsection

@section('main-content')
<div class="card">
    <div class="card-header text-right">
        <button type="button" class="btn btn-primary px-3" onclick="createIuran()">Create Iuran</button>
    </div>
    <div class="card-body table-responsive">
        <table id="iuran" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Periode</th>
                    <th>Jumlah</th>
                    <th class="text-center">Detail</th>
                    <th class="text-center">Print</th>
                    <th class="text-center">Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $key => $value)
                <span style="display: none;">{{ $mulai = $value->tahun, $akhir = $value->akhir }} {{ $konvert1 = date('Y', strtotime($mulai)), $konvert2 = date('Y', strtotime($akhir)) }}</span>
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $konvert1 }}-{{ $konvert2 }}</td>
                    <td>Rp. {{ number_format($value->jumlah, 2) }}</td>
                    <td>
                        <a type="button" class="btn btn-block btn-primary" href="{{ route('detail', $value->id) }}"><i class="fas fa-folder-open"></i></a>
                    </td>
                    <td>
                        <a type="button" class="btn btn-block btn-success" href="{{ route('laporan', $value->id) }}"><i class="fas fa-print"></i></a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-block btn-danger" onclick="deleteRuleIuran({{ $value->id }})"><i class="fas fa-dumpster"></i></button>
                    </td>
                </tr>
                @empty
                <tr><th colspan="6" class="text-center">Data kosong !</th></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script>
   $(function () {
        $("#iuran").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });

    function createIuran() {
        $.ajax({
            url: "{{ url('admin/master/iuran/form') }}",
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

    function deleteRuleIuran(id) {
        if (confirm("Apakah kamu yakin Ingin menghapus aturan iuran ini ?")) {
            $.ajax({
                method: "DELETE",
                url: "{{ url('admin/master/iuran/deleteruleiuran') }}",
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                data: {
                    id_data: id,
                },
                dataType: "JSON",
                success: function (response) {
                    alert(response.message)
                    loadiuran(1)
                }
            });
        }
    }
</script>
@endsection

@section('modals')
    <div class="modal fade" id="modal-lg" aria-hidden="true" style="display: none;">

    </div>
@endsection
