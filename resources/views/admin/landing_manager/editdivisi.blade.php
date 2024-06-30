@extends('layout/master')

@section('title', 'Anggota')

@section('menu')
    @include('layout/partial/menu/admin')
@endsection

@section('header-content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <h4>Edit Divisi</h4>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{ $divisi->title }}
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="textarea" placeholder="Place some text here" id="desc"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $divisi->description }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-block btn-success" onclick="simpan({{ $divisi->id }})">Simpan</button>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('js')
    <script>
        $(function () {
            $('.textarea').summernote()
        })
        function simpan(id) {
            var desk = $('#desc').val();
            $.ajax({
                method: 'PUT',
                url: "{{ url('admin/landing/beranda/update') }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    id_data: id,
                    desc: desk
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status) {
                        alert(data.message)
                    } else {
                        alert(data.message)
                    }
                },
            });
        }
    </script>
@endsection
