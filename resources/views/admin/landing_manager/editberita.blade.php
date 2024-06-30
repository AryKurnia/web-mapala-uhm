@extends('layout/master')

@section('title', 'Anggota')

@section('menu')
    @include('layout/partial/menu/admin')
@endsection

@section('header-content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <h4>Berita</h4>
        </div>
    </div>
@endsection

@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Berita</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form id="updateberita">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="hidden" value="{{ $data->id }}" name="id_berita">
                        <input type="text" class="form-control" placeholder="judul berita" value="{{ $data->title }}" name="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="foto">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori">
                          <option value="kegiatan">Kegiatan</option>
                          <option value="feature">Feature</option>
                          <option value="opini">Opini</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="textarea" placeholder="Place some text here" name="desc"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $data->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-block btn-success">Update</button>
                </form>
            </div>
            <div class="card-footer">
                Berita Posted {{ $data->created_at->diffForHumans() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        var kategori = '{{$data->category}}'

        if (kategori == 'kegiatan') {
            $('option[value="kegiatan"]').attr('selected', true)
        } else if(kategori == 'feature') {
            $('option[value="feature"]').attr('selected', true)
        } else if(kategori == 'opini') {
            $('option[value="opini"]').attr('selected', true)
        }

        $(document).ready(function() {
            $('#updateberita').submit(function(e){
                e.preventDefault();
                $form = $(this)
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ url('admin/landing/berita/update') }}",
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        console.log(response)
                        if (response.status == true) {
                            alert(response.message)
                            location.replace("{{ route('berita') }}")
                        } else {
                            alert(response.message)
                        }
                        unloading()
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
        });
    </script>
@endsection
