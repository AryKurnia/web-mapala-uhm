@extends('layout/master')

@section('title', 'Berita')

@section('menu')
    @include('layout/partial/menu/admin')
@endsection

@section('main-content')
    <div class="text-right">
        <a type="button" class="btn btn-info px-5" href="{{ route('createberita') }}">Create Berita</a>
    </div>
    <div class="row">
        <div class="col-12" id="loadberita">

        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            loadBerita(1)
        });

        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            loadBerita(page)
        });

        function loadBerita(page) {
            $.ajax({
                url: "{{ url('admin/landing/berita/list') }}?page="+page+"",
                data: {
                },
                method: 'GET',
                success: function (data) {
                    if (data.status) {
                        $("#loadberita").html(data.html);
                    } else {
                        $("#loadberita").html("");
                    }
                }
            });
        }

        function deleteBerita(id) {
            $.ajax({
                method: "DELETE",
                url: "{{ url('admin/landing/berita/delete') }}",
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                data: {
                    id_data: id,
                },
                dataType: "JSON",
                success: function (response) {
                    alert(response.message)
                    loadBerita(1)
                }
            });
        }
    </script>
@endsection
