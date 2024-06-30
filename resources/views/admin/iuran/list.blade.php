<div class="card">
    <div class="card-header">
      <h3 class="card-title">Table Iuran</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Tahun</th>
            <th>Jumlah</th>
            <th style="width: 10%;" colspan="3" class="text-center">Detail</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($data as $key => $value)
                <span style="display: none;">{{ $date = $value->tahun }} {{ $konvert = date('Y', strtotime($date)) }}</span>
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $konvert }}</td>
                    <td>Rp. {{ number_format($value->jumlah, 2) }}</td>
                    <td>
                        <a type="button" class="btn btn-block btn-primary" href="{{ route('detail', $value->id) }}"><i class="fas fa-folder-open"></i></a>
                    </td>
                    <td>
                        <a type="button" class="btn btn-block btn-success" href="{{ route('laporan', $value->id) }}"><i class="fas fa-print"></i></a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-block btn-danger" onclick="deleteRuleIuran({{ $value->id }})"><i class="fas fa-dumpster"></i></button>
                    </td>
                </tr>
            @empty
                <th colspan="4">data kosong !</th>
            @endforelse
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        {{ $data->links() }}
    </div>
  </div>
  <script>
      function deleteRuleIuran(id) {
        if (confirm("Apakah kamu yakin Ingin menghapus aturan iuran ini ?")) {
            $.ajax({
                method: "DELETE",
                url: "{{ url('admin/master/iuran/deleteruleiuran') }}",
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                data: {
                    id_data: id,
                },
                dataType: "JSON",
                success: function (response) {
                    alert(response.message)
                    loadiuran(1)
                }
            });
        }
      }
  </script>
