<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form id="simpan" method="post">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">Create User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="createdata">
                <div class="form-group">
                    <label for="">Nia / Niam : </label>
                    <input type="text" class="form-control" name="nia" placeholder="nia / niam">
                </div>
                <div class="form-group">
                    <label>Nama Lengkap : </label>
                    <input type="text" class="form-control" name="nama" placeholder="nama">
                </div>
                <div class="form-group">
                    <label>Password :</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label>Nama Lapangan :</label>
                    <input type="text" class="form-control" name="username" placeholder="nama lapangan">
                </div>
                <div class="form-group">
                    <label>Jurusan :</label>
                    <select class="form-control" name="jurusan">
                        <option value="TI">TI</option>
                        <option value="SK">SK</option>
                        <option value="SI">SI</option>
                        <option value="MI">MI</option>
                        <option value="KA">KA</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kategori :</label>
                    <select class="form-control" name="kategori">
                        <option value="Pendiri">Pendiri</option>
                        <option value="Anggota Kehormatan">Anggota Kehormatan</option>
                        <option value="Anggota Penuh">Anggota Penuh</option>
                        <option value="Anggota Istimewa">Anggota Istimewa</option>
                        <option value="Anggota Muda">Anggota Muda</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Angkatan :</label>
                    <input type="text" class="form-control" name="angkatan" placeholder="angkatan">
                </div>
                <div class="form-group">
                    <label>Atribut :</label>
                    <select class="select2" multiple="multiple" name="atribut[]" data-placeholder="Select a State" style="width: 100%;">
                        @foreach ($identitas as $item)
                            <option value="{{ $item->id }}">{{ $item->identitas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Foto :</label>
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
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })

    $(document).ready(function() {
        $('#simpan').submit(function(e){
            e.preventDefault();
            $form = $(this)
            var formData = new FormData(this);
            $.ajax({
                url: "{{ url('admin/master/anggota/simpan') }}",
                method: 'POST',
                data: formData,
                success: function (response) {
                    if (response.status == true) {
                        alert(response.message)
                        $('#modal-lg').modal('toggle');
                        $('#modal-lg').html('');
                    } else {
                        alert(response.message)
                    }
                },
                error: function (response) {
                    alert(response.message)
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    });
</script>
