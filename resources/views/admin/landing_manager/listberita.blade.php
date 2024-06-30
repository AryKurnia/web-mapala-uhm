<div class="card">
    <div class="card-header">
        <h3 class="card-title pt-1">List Berita</h3>
        <div class="card-tools py-2">
            <ul class="pagination pagination-sm float-right">
                {{ $berita->links() }}
            </ul>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th colspan="2" class="text-center" style="width: 30%;">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($berita as $key => $item)
                <tr>
                    <td>{{ $berita->firstItem() + $key }}</td>
                    <td>{{ $item->title }}</td>
                    <td class="text-center">
                        <a type="button" class="btn btn-warning btn-lg btn-block" href="{{ route('editberita', $item->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger btn-lg btn-block" onclick="deleteBerita({{ $item->id }})">
                            <i class="fas fa-eraser"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <th colspan="3">Berita Kosong !</th>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
