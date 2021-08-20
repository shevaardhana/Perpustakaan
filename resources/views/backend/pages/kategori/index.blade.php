@extends('backend.layouts.default')

@section('content')
<div class="d-sm-flex justify-content-end mb-4">
    <a href="#" class="btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-100"></i> Tambah Data Kategori
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="d-sm-flex d-flex justify-content-center text-primary">Data Kategori</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
