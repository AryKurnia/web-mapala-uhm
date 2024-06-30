@extends('layout/master')

@section('title', 'Berita')

@section('menu')
    @include('layout/partial/menu/admin')
@endsection

@section('header-content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <h4>Visi & Misi</h4>
        </div>
    </div>
@endsection

@section('main-content')
<div class="card">
    <div class="card-header text-right">
        <button type="button" class="btn btn-primary px-3" onclick="createVisiMisi()">Create Visi / Misi</button>
    </div>
    <div class="card-body">
        <table id="ketua" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50%;">Visi / Misi</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td>{{ $item->visimisi }}</td>
                    <td>{{ $item->category }}</td>
                    <td>
                        <button type="button" class="btn btn-block btn-warning" onclick="editVM({{ $item->id }})"><i class="fas fa-user-slash"></i></button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-block btn-danger" onclick="deleteVM({{ $item->id }})"><i class="fas fa-user-slash"></i></button>
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
            $("#ketua").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });

        function deleteVM(id) {
            $.ajax({
                method: "DELETE",
                url: "{{ url('admin/landing/visimisi/delete') }}",
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                data: {
                    id_data: id,
                },
                dataType: "JSON",
                success: function (response) {
                    alert(response.message)
                    location.reload();
                }
            });
        }

        function createVisiMisi() {
            $.ajax({
                url: "{{ url('admin/landing/visimisi/form') }}",
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

        function editVM(id) {
            $.ajax({
                url: "{{ url('admin/landing/visimisi/edit') }}",
                data: {
                    id: id,
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
    </script>
@endsection

@section('modals')
    <div class="modal fade" id="modal-lg" aria-hidden="true" style="display: none;">

    </div>
@endsection
