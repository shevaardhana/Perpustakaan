@extends('backend.layouts.default')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Data Buku</h1>
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
            <form action="{{ route('buku.store')}}" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Isi Judul" value="{{ old('judul')}}" required>
                </div>

                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" value="{{ old('photo') }}" accept="image/*" class="form-control @error('photo') is-invalid @enderror"/>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="editor" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="kategori" class="form-control-label">Kategori</label>
                    <select name="categories_id" class="form-control @error('categories_id') is-invalid @enderror" >
                        <option>Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->kategori }}</option>
                        @endforeach

                    </select>
                    @error('categories_id') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_terbit">Tanggal Terbit</label>
                    <input type="date" class="form-control" name="tanggal_terbit" value="{{ old('tanggal_terbit')}}" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
         </div>
    </div>
</div>
@endsection
