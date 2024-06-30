@extends('layout/master')

@section('title', 'Anggota')

@section('menu')
    @include('layout/partial/menu/admin')
@endsection

@section('header-content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <h4>Editor Beranda</h4>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div id="tabeldivisi">

            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        loadiuran()
    });

    function loadiuran(page) {
        $.ajax({
            url: "{{ url('admin/landing/beranda/list-divisi') }}",
            data: {
            },
            method: 'GET',
            success: function (data) {
                if (data.status) {
                    $("#tabeldivisi").html(data.html);
                } else {
                    $("#tabeldivisi").html("");
                }
            },
            error: function (data) {
                unloading()
            }
        });
    }

    // function editperlengkapan(id) {
    //     $.ajax({
    //         url: "{{ url('admin/master/perlengkapan/edit') }}",
    //         data: {
    //             csrfmiddlewaretoken: '{{ csrf_field() }}',
    //             id_data: id,
    //         },
    //         method: 'GET',
    //         success: function (data) {
    //             if (data.status) {
    //                 $('#modal-lg').html('');
    //                 $("#modal-lg").html(data.html);
    //                 $("#modal-lg").modal('show', {
    //                     backdrop: 'true'
    //                 });
    //             } else {
    //                 $('#modal-lg').html('');
    //             }
    //         },
    //         error: function (data) {

    //         }
    //     });
    // }
</script>
@endsection

@section('modals')
    <div class="modal fade" id="modal-lg" aria-hidden="true" style="display: none;">

    </div>
@endsection
