@extends('backend.layouts.default')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Update Kategori</h1>
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
            <form action="{{ route('kategori.update', $items->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="Kategori">Kategori</label>
                    <input type="text"
                        class="form-control"
                        name="kategori"
                        placeholder="Isi Kategori"
                        value="{{ old('kategori') ? old('kategori') : $items->kategori }}"
                        @error('name') is-invalid @enderror required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
         </div>
    </div>
</div>
@endsection
