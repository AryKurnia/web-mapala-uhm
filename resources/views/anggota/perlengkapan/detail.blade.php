<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Detail Data Perlengkapan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group text-center">
                <img src="{{ asset('assets/images/perlengkapan/'.$detail->gambar) }}" alt="perlengkapan" class="img-fluid">
            </div>
            <div class="form-group mt-3">
                <label for="">Merek : </label>
                <input type="text" class="form-control" value="{{ $detail->merek }}" readonly>
            </div>
            <div class="form-group">
                <label>Warna :</label>
                <input type="text" class="form-control" value="{{ $detail->warna }}" readonly>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
    </div>
    <!-- /.modal-content -->
</div>
