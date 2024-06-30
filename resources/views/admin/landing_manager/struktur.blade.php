@extends('layout/master')

@section('title', 'Anggota')

@section('menu')
    @include('layout/partial/menu/admin')
@endsection

@section('header-content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <h4>Struktur Pengurus</h4>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form id="simpan">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputFile">Upload Struktur</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    @if (isset($data))
                                        <input type="hidden" name="id_data" value="{{ $data->id }}">
                                    @endif
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="foto">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    {{-- <span onclick="simpan()">Upload</span> --}}
                                    <button type="submit" class="btn btn-default" style="display: inline;">Upload</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body" id="loadgambar">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            loadGambar();

            $('#simpan').submit(function(e){
                e.preventDefault();
                $form = $(this)
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ url('admin/landing/struktur/upload') }}",
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        if (response.status) {
                            alert(response.message)
                            loadGambar();
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

        function loadGambar() {
            $.ajax({
                url: "{{ url('admin/landing/struktur/image') }}",
                method: 'GET',
                success: function (data) {
                    if (data.status) {
                        $("#loadgambar").html(data.html);
                    } else {
                        $("#loadgambar").html("");
                    }
                },
            });
        }
    </script>
@endsection
