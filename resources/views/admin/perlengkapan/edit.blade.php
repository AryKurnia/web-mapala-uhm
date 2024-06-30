<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form id="update" method="post">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">Update Perlengkapan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="createdata">
                <div class="form-group">
                    <label for="">Perlengkapan : </label>
                    <input type="text" class="form-control" name="perlengkapan" placeholder="nama perlengkapan" value="{{ $data->nama }}">
                    <input type="hidden" name="id_data" value="{{ $data->id }}">
                </div>
                <div class="form-group">
                    <label>Jumlah :</label>
                    <input type="number" class="form-control" name="jumlah" placeholder="jumlah" value="{{ $data->jumlah }}">
                </div>
                <div class="form-group">
                    <label>Merek :</label>
                    <input type="text" class="form-control" name="merek" placeholder="merek perlengkapan" value="{{ $data->merek }}">
                </div>
                <div class="form-group">
                    <label>Warna :</label>
                    <input type="text" class="form-control" name="warna" placeholder="warna" value="{{ $data->warna }}">
                </div>
                <div class="form-group">
                    <label>Kondisi :</label>
                    <select class="form-control" name="kondisi">
                        @if ($data->kondisi == 'BAIK')
                            <option value="BAIK" selected>Baik</option>
                            <option value="TIDAK BAIK">Tidak Baik</option>
                        @else
                            <option value="Baik">Baik</option>
                            <option value="TIDAK BAIK" selected>Tidak Baik</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label>Jenis :</label>
                    <select class="form-control" name="jenis">
                        <option value="Gunung Hutan">Gunung Hutan</option>
                        <option value="Panjat Tebing">Panjat Tebing</option>
                        <option value="Susur Gua">Susur Gua</option>
                        <option value="Kesekretariatan">Kesekretariatan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Gambar Perlengkapan</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="foto">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update changes</button>
            </div>
        </form>
    </div>
<!-- /.modal-content -->
</div>
<script>
    $(document).ready(function() {
        var kategori = '{{$data->jenis}}'

        if (kategori == 'Gunung Hutan') {
            $('option[value="Gunung Hutan"]').attr('selected', true)
        } else if(kategori == 'Panjat Tebing') {
            $('option[value="Panjat Tebing"]').attr('selected', true)
        } else if(kategori == 'Susur Gua') {
            $('option[value="Susur Gua"]').attr('selected', true)
        } else if(kategori == 'Kesekretariatan') {
            $('option[value="Kesekretariatan"]').attr('selected', true)
        }

        $('#update').submit(function(e){
            e.preventDefault();
            $form = $(this)
            var formData = new FormData(this);
            $.ajax({
                url: "{{ url('admin/master/perlengkapan/update') }}",
                type: 'POST',
                data: formData,
                success: function (response) {
                    console.log(response)
                    if (response.status == true) {
                        alert(response.message)
                        $('#modal-lg').modal('toggle');
                        $('#modal-lg').html('');
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
