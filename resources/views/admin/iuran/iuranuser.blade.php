<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Iuran Rule Iuran</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="createdata">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Bayar</th>
                        <th>Tanggal</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($iuran_user->iurans as $key => $value)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>Rp. {{ number_format($value->pivot->bayar, 2) }}</td>
                            <td>{{ date("d-m-Y", strtotime($value->pivot->tanggal)) }}</td>
                            <td><button type="button" class="btn btn-block btn-danger" onclick="deleteIuran({{ $value->pivot->id }})"><i class="fas fa-trash-alt"></i></button></td>
                        </tr>
                    @empty
                        <th colspan="4">Pembayaran belum ada !</th>
                    @endforelse
                    <tr>
                        <th colspan="2">Total</th>
                        <th colspan="2" class="text-right pr-4">Rp. {{ number_format($total_iuran, 2) }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            {{-- <button type="submit" class="btn btn-primary">Save changes</button> --}}
        </div>
    </div>
<!-- /.modal-content -->
</div>
<script>
    function deleteIuran(id) {
        $.ajax({
            method: "DELETE",
            url: "{{ url('admin/master/iuran/deleteiuranuser') }}",
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: {
                id_data: id,
            },
            dataType: "JSON",
            success: function (response) {
                alert(response.message)
                $('#modal-lg').modal('toggle');
                $('#modal-lg').html('');
            }
        });
    }
</script>
