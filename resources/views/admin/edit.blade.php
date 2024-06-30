<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form id="simpan" method="post">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">Edit Admin</h4>
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
                    <label>Password Baru :</label>
                    <input type="password" class="form-control" name="password" placeholder="password">
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
                url: "{{ url('admin/update') }}",
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
                cache: false,
                contentType: false,
                processData: false
            });
        });
    });
</script>
