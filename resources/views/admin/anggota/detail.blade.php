<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Detail Data Anggota</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="">nama : </label>
                <input type="text" class="form-control" value="{{ $data->nama }}" readonly>
            </div>
            <div class="form-group">
                <label>Alamat :</label>
                <textarea class="form-control" rows="3" readonly>{{ $data->alamat }}</textarea>
            </div>
            <div class="form-group">
                <label>No. HP :</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">+62</span>
                    </div>
                    <input type="text" class="form-control" value="{{ $data->no_telp }}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label>Keterangan :</label>
                <textarea class="form-control" rows="3" readonly>{{ $data->ket }}</textarea>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
    </div>
    <!-- /.modal-content -->
</div>
