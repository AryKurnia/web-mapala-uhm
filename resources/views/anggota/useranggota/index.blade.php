@extends('layout.master')

@section('title', 'Dashboard')

@section('menu')
    @include('layout/partial/menu/anggota')
@endsection

@section('main-content')
<div class="card">
    <div class="card-header">
        <h5 class="m-0">Anggota</h5>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nia / Niam</th>
                    <th>Nama</th>
                    <th>Angkatan</th>
                    <th>Status Anggota</th>
                    <th>Slayer</th>
                    <th class="text-center">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggota as $item)
                <tr>
                    <td>{{ $item->user->nia }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->angkatan }}</td>
                    <td class="text-center">{{ $item->category }}</td>
                    @forelse ($item->atribut as $value)
                        <td class="text-centera">{{ $value->identitas }}</td>
                    @empty
                        <td>belum memiliki slayer</td>
                    @endforelse
                    <td><a href="{{ route('detailuser', $item->id) }}" class="btn btn-block btn-primary"><i class="fas fa-user-circle"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    //   $('#example2').DataTable({
    //     "paging": true,
    //     "lengthChange": false,
    //     "searching": false,
    //     "ordering": true,
    //     "info": true,
    //     "autoWidth": false,
    //     "responsive": true,
    //   });
    });
  </script>
@endsection
