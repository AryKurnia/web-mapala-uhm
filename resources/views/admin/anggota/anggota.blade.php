@extends('layout/master')

@section('title', 'Anggota')

@section('menu')
    @include('layout/partial/menu/admin')
@endsection

@section('header-content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <h4>Anggota</h4>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="tabelanggota">

            </div>

        </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        loaddata(1)
    });

    function loaddata(page) {
        // loading('#tabelanggota')
        $.ajax({
            url: "{{ url('admin/master/anggota/list') }}?page="+page+"",
            data: {

            },
            method: 'GET',
            success: function (data) {
                if (data.status) {
                    $("#tabelanggota").html(data.html);
                } else {
                    $("#tabelanggota").html("");
                }
            },
            error: function (data) {
                unloading()
            }
        });
    }
</script>
@endsection

@section('modals')
    <div class="modal fade" id="modal-lg" aria-hidden="true" style="display: none;">

    </div>
@endsection
