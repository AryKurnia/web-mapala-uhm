<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form id="update" method="post">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">Edit Visi / Misi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="createdata">
                <div class="form-group">
                    <label>Visi / Misi :</label>
                    <input type="text" class="form-control" name="visimisi" placeholder="visi / misi" value="{{ $data->visimisi }}">
                    <input type="hidden" name="id_data" value="{{ $data->id }}">
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
    $(document).ready(function () {
        var kategori = '{{$data->category}}'

        if (kategori == 'visi') {
            $('option[value="visi"]').attr('selected', true)
        } else {
            $('option[value="misi"]').attr('selected', true)
        }
    });

    $('#update').submit(function (e) {
        e.preventDefault();
        $form = $(this)
        var formData = new FormData(this);
        $.ajax({
            url: "{{ url('admin/landing/visimisi/update') }}",
            type: 'POST',
            data: formData,
            success: function (response) {
                console.log(response)
                if (response.status == true) {
                    alert(response.message)
                    location.reload()
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
