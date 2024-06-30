<div class="card">
    <div class="card-header">
      <h3 class="card-title">Table Divisi</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Divisi</th>
            {{-- <th>Deskripsi</th> --}}
            <th style="width: 10%;" class="text-center">Opsi</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($divisi as $key => $value)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $value->title }}</td>
                    <td>
                        <a type="button" class="btn btn-block btn-warning" href="{{ route('editDivisi', $value->id) }}"><i class="fas fa-print"></i></a>
                    </td>
                </tr>
            @empty
                <th colspan="4">data kosong !</th>
            @endforelse
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <script>

  </script>
