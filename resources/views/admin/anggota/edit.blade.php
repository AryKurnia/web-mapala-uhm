<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form id="updateanggota" method="post">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="createdata">
                <div class="form-group">
                    <label for="">Nia / Niam: </label>
                    <input type="text" class="form-control" name="nia" placeholder="nia / niam" value="{{ $data->nia }}">
                    <input type="hidden" name="id_data" value="{{ $data->id }}">
                </div>
                <div class="form-group">
                    <label>Nama Lapangan :</label>
                    <input type="text" class="form-control" name="username" placeholder="username" value="{{ $data->name }}">
                </div>
                <div class="form-group">
                    <label>Angkatan :</label>
                    <input type="text" class="form-control" name="angkatan" placeholder="angkatan" value="{{ $data->anggota->angkatan }}">
                    <input type="hidden" name="id_anggota" value="{{ $data->anggota->id }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $data->email }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Atribut :</label>
                    <select class="select2" multiple="multiple" name="atribut[]" data-placeholder="Select a State" style="width: 100%;">
                        @foreach ($identitas as $item)
                            @forelse ($item->atribut as $val)
                            <option value="{{ $item->id }}" selected>{{ $item->identitas }}</option>
                            @empty
                            <option value="{{ $item->id }}">{{ $item->identitas }}</option>
                            @endforelse
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nama : </label>
                    <input type="text" class="form-control" name="nama" placeholder="nama lengkap" value="{{ $data->anggota->nama }}">
                </div>
                <div class="form-group">
                    <label>Jurusan :</label>
                    <select class="form-control" name="jurusan">
                        @if ($data->anggota->jurusan == "TI")
                        <option value="TI" selected>TI</option>
                        @endif
                        @if ($data->anggota->jurusan == "SK")
                        <option value="SK" selected>SK</option>
                        @endif
                        @if ($data->anggota->jurusan == "SI")
                        <option value="SI" selected>SI</option>
                        @endif
                        @if ($data->anggota->jurusan == "MI")
                        <option value="MI" selected>MI</option>
                        @endif
                        @if ($data->anggota->jurusan == "KA")
                        <option value="KA" selected>KA</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat :</label>
                    <textarea class="form-control" rows="3" name="alamat">{{ $data->anggota->alamat }}</textarea>
                </div>
                <div class="form-group">
                    <label>No. HP :</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+62</span>
                        </div>
                        <input type="text" class="form-control" value="{{ $data->anggota->no_telp }}" name="no_telp">
                    </div>
                </div>
                <div class="form-group">
                    <label>Keterangan :</label>
                    <textarea class="form-control" rows="3" name="ket">{{ $data->anggota->ket }}</textarea>
                </div>
                <div class="form-group">
                    <label>Kategori :</label>
                    <select class="form-control" name="kategori">
                        @if ($data->anggota->category == "Pendiri")
                        <option value="Pendiri" selected>Pendiri</option>
                        @endif
                        @if ($data->anggota->category == "Anggota Kehormatan")
                        <option value="Anggota Kehormatan" selected>Anggota Kehormatan</option>
                        @endif
                        @if ($data->anggota->category == "Anggota Penuh")
                        <option value="Anggota Penuh" selected>Anggota Penuh</option>
                        @endif
                        @if ($data->anggota->category == "Anggota Istimewa")
                        <option value="Anggota Istimewa" selected>Anggota Istimewa</option>
                        @endif
                        @if ($data->anggota->category == "Anggota Muda")
                        <option value="Anggota Muda" selected>Anggota Muda</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Foto :</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="foto">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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
        $('#updateanggota').submit(function(e){
            e.preventDefault();
            $form = $(this)
            var formData = new FormData(this);
            $.ajax({
                url: "{{ url('admin/master/anggota/update') }}",
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
