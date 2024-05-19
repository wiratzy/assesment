@extends('layouts.main')
@section('container')
<a href="/makanan/create" class="btn btn-primary mt-3">Tambah Data</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama Makanan</th>
            <th scope="col">Harga</th>
            <th scope="col">Gambar</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @php $no = 0; @endphp
        @foreach ($data as $item)
        @php $no++ @endphp
        <tr>
            <th scope="row">{{ $no }}</th>
            <td>{{ $item->nama_makanan }}</td>
            <td>{{ $item->harga }}</td>
            <td><img src='{{ url("/daftar-gambar/$item->gambar")}}' width="50" height="50"></img></td>
            <td>
                <!-- Anda bisa menambahkan aksi edit dan hapus di sini jika diinginkan -->
                <a href="{{ route('makanan.edit', $item->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                <form action="{{ route('makanan.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Tombol Tambah Data di luar loop -->

@endsection
