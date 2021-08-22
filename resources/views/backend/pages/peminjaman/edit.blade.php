@extends('backend.layouts.default')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Update Peminjaman</h1>
    </div>

    <!-- Munculkan error -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('peminjaman.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="no_siswa">NIS</label>
                    <input type="text"
                        class="form-control"
                        name="no_siswa"
                        placeholder="Isi no_siswa"
                        value="{{ old('no_siswa') ? old('no_siswa') : $item->no_siswa}}"
                        @error('no_siswa') is-invalid @enderror required>
                </div>

                <div class="form-group">
                    <label for="nama">NIS</label>
                    <input type="text"
                        class="form-control"
                        name="nama"
                        value="{{ old('nama') ? old('nama') : $item->nama}}"
                        @error('nama') is-invalid @enderror required>
                </div>

                <div class="form-group">
                    <label for="tanggal_pinjam">tanggal pinjam</label>
                    <input type="date"
                        class="form-control"
                        name="tanggal_pinjam"
                        value="{{ old('tanggal_pinjam') ? old('tanggal_pinjam') : $item->tanggal_pinjam}}"
                        @error('tanggal_pinjam') is-invalid @enderror required>
                </div>

                <div class="form-group">
                    <label for="tanggal_pengembalian">tanggal pengembalian</label>
                    <input type="date"
                        class="form-control"
                        name="tanggal_pengembalian"
                        value="{{ old('tanggal_pengembalian') ? old('tanggal_pengembalian') : $item->tanggal_pengembalian}}"
                        @error('tanggal_pengembalian') is-invalid @enderror required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
         </div>
    </div>
</div>
@endsection
