@extends('backend.layouts.default')

@section('content')
<div class="d-sm-flex justify-content-end mb-4">
    <a href="{{route('buku.create')}}" class="btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-100"></i> Tambah Data Buku
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="d-sm-flex d-flex justify-content-center text-primary">Data Buku</h1>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark text-center">
                    <tr>
                        <th>No <i class="fa fa-sort"></i></th>
                        <th>Judul <i class="fa fa-sort"></th>
                        <th>Photo <i class="fa fa-sort"></th>
                        <th>Kategori <i class="fa fa-sort"></th>
                        <th>Tanggal terbit <i class="fa fa-sort"></th>
                        <th>Action <i class="fa fa-sort"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;?>
                    @forelse ($items as $value)
                    <?php $no++ ;?>

                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $value->judul }}</td>
                        <td><img src="{{ url($value->photo) }}" alt="" style="width: 200px"/></td>
                        <td>{{ $value->category->kategori }}</td>
                        <td>{{ $value->tanggal_terbit }}</td>
                        <td style="text-align:center;">
                            <a href="{{ route('buku.edit', $value->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form action="{{ route('buku.destroy', $value->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            Belum Ada Data Kategori
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('after-script')
    <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
    $(function () {
        $("#dataTable").DataTable();
    });
    </script>
@endpush
