@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New </h1>
    </div>
    <div class="col-lg-8">
        <form method="POST" action="/makanan/store" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="nama_makanan" class="form-label">nama makanan</label>
                <input type="text" placeholder="silahkan masukkan nama makanan" class="form-control @error('nama_makanan') is-invalid @enderror" id="nama_makanan" name="nama_makanan" required autofocus value="{{ old('nama_makanan') }}">
                @error('nama_makanan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">harga</label>
                <input type="Number" placeholder="silahkan masukkan harga berupa angka" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga"   required value="{{ old('harga') }}">
                @error('harga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <img id="addImage" class="img-preview mb-3 img-fluid" width="50" height="50" >
                <br>
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="image" name="gambar"  onchange="lihatGambar()" accept=".jpg, .jpeg, .png" required>
            </div>
            </div>
    <button type="submit" class="btn btn-primary">Tamba Data</button>
    </form>
    </div>
@endsection
