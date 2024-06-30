<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form id="simpan" method="post">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">Create Visi / Misi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="createdata">
                <div class="form-group">
                    <label>Visi / Misi :</label>
                    <input type="text" class="form-control" name="visimisi" placeholder="visi / misi" id="visimisi">
                </div>
                <div class="form-group">
                    <label>Kategori : </label>
                    <select class="form-control" name="kategori">
                        <option value="visi">Visi</option>
                        <option value="misi">Misi</option>
                    </select>
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
    $('#simpan').submit(function (e) {
        e.preventDefault();
        $form = $(this)
        var formData = new FormData(this);
        $.ajax({
            url: "{{ url('admin/landing/visimisi/store') }}",
            type: 'POST',
            data: formData,
            success: function (response) {
                console.log(response)
                if (response.status == true) {
                    alert(response.message)
                    $('#visimisi').val("");
                } else {
                    alert(response.message)
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>
