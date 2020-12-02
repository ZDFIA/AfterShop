@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href=" {{ url('/') }} " class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ url('/') }} ">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fas fa-box-open"></i> Data Barang</h3>
                    <a href="{{ url('item/add') }}" class="btn btn-primary mt-2"><i class="fas fa-plus-square"></i> Tambah Barang</a>
                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stock</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><img src="{{ url('uploads') }}/{{ $item->image }}" alt="" width="100"></td>
                                <td>{{ $item->name }}</td>
                                <td>Rp {{ number_format($item->price) }}</td>
                                <td>{{ $item->stock }}</td>
                                <td>
                                    <form action="{{ url('item') }}/{{ $item->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{ url('item/detail') }}/{{ $item->id }}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
                                        <a href="{{ url('item/edit') }}/{{ $item->id }}" class="btn btn-success"><i class="fas fa-pencil-alt"></i> Edit</a>
                                        <button type="submit" class="btn btn-danger btn" onclick="return confirm('Anda Yakin Akan Menghapus Pengguna Ini ?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
