<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form id="simpan" method="post">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">Create Ketua</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="createdata">
                <div class="form-group">
                    <label>Nama :</label>
                    <input type="text" class="form-control" name="nama" placeholder="nama">
                </div>
                <div class="form-group">
                    <label>Periode :</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control float-right" id="reservation" name="periode">
                    </div>
                    <!-- /.input group -->
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
        $(function () {
            $('#reservation').daterangepicker()
        })

        $('#simpan').submit(function(e){
            e.preventDefault();
            $form = $(this)
            var formData = new FormData(this);
            $.ajax({
                url: "{{ url('admin/landing/ketua/simpan') }}",
                type: 'POST',
                data: formData,
                success: function (response) {
                    console.log(response)
                    if (response.status == true) {
                        alert(response.message)
                        $('#modal-lg').modal('toggle');
                        $('#modal-lg').html('');
                        location.reload();
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
