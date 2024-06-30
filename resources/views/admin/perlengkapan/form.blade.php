<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form id="simpan" method="post">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">Create Perlengkapan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="createdata">
                <div class="form-group">
                    <label for="">Perlengkapan : </label>
                    <input type="text" class="form-control" name="perlengkapan" placeholder="nama perlengkapan">
                </div>
                <div class="form-group">
                    <label>Jumlah :</label>
                    <input type="number" class="form-control" name="jumlah" placeholder="jumlah">
                </div>
                <div class="form-group">
                    <label>Merek :</label>
                    <input type="text" class="form-control" name="merek" placeholder="merek perlengkapan">
                </div>
                <div class="form-group">
                    <label>Warna :</label>
                    <input type="text" class="form-control" name="warna" placeholder="warna">
                </div>
                <div class="form-group">
                    <label>Kondisi :</label>
                    <select class="form-control" name="kondisi">
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
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
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
<!-- /.modal-content -->
</div>
<script>
    $(document).ready(function() {
        $('#simpan').submit(function(e){
            e.preventDefault();
            $form = $(this)
            var formData = new FormData(this);
            $.ajax({
                url: "{{ url('admin/master/perlengkapan/simpan') }}",
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
