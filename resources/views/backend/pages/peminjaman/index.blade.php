@extends('backend.layouts.default')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="d-sm-flex d-flex justify-content-center text-primary">Data Kategori</h1>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark text-center">
                    <tr>
                        <th>No <i class="fa fa-sort"></th>
                        <th>NIS <i class="fa fa-sort"></th>
                        <th>Nama <i class="fa fa-sort"></th>
                        <th style="width: 15%;">Tanggal Pinjam <i class="fa fa-sort"></th>
                        <th style="width: 15%;">Tanggal Pengembalian <i class="fa fa-sort"></th>
                        <th>Status <i class="fa fa-sort"></th>
                        <th>Action <i class="fa fa-sort"></th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 0;?>
                    @forelse ($items as $value)
                    <?php $no++ ;?>

                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $value->no_siswa }}</td>
                        <td>{{ $value->nama }}</td>
                        <td>{{ $value->tanggal_pinjam }}</td>
                        <td>{{ $value->tanggal_pengembalian }}</td>
                        <td>
                            @if ($value->status == 'PROCESS')
                                <span class="badge badge-secondary">
                            @elseif ($value->status == 'ONGOING')
                                <span class="badge badge-primary">
                            @elseif ($value->status == 'RECEIVED')
                                <span class="badge badge-success">
                            @elseif ($value->status == 'LATE')
                                <span class="badge badge-danger">
                            @else
                                <span>
                            @endif
                            {{$value->status}}
                                </span>
                        </td>

                        <td>

                            @if ($value->status == 'PROCESS')
                                <a href="{{ route('peminjaman.status', $value->id) }}?status=ONGOING" class="btn btn-primary btn-sm">
                                    <i class="fa fa-book-reader"></i>
                                </a>

                                <a href="{{ route('peminjaman.status', $value->id) }}?status=RECEIVED" class="btn btn-success btn-sm">
                                    <i class="fa fa-check-circle"></i>
                                </a>

                                <a href="{{ route('peminjaman.status', $value->id) }}?status=LATE" class="btn btn-warning btn-sm">
                                    <i class="fa fa-calendar-times"></i>
                                </a>
                            @endif

                            <a href="#mymodal" data-remote="{{ route('peminjaman.show', $value->id) }}" data-toggle="modal" data-target="#mymodal" data-title="Detail Peminjaman siswa {{ $value->nama }}" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a href="{{ route('peminjaman.edit', $value->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <form action="{{ route('peminjaman.destroy', $value->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center p-5">
                                    Data Tidak Tersedia
                                </td>
                            </tr>
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
