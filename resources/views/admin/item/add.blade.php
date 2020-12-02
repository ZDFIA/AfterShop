@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href=" {{ url('item') }} " class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ url('/') }} ">Home</a></li>
                    <li class="breadcrumb-item"><a href=" {{ url('item') }} ">Data Barang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Barang</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
           <div class="card mt-2">
               <div class="card-body">
                   <h4><i class="fas fa-plus-square"></i> Tambah Barang</h4>
                   <form method="POST" action="{{ url('item/add') }}">
                       @csrf
                       <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Nama</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-2 col-form-label text-md-right">Harga</label>
                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" required autocomplete="price">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stock" class="col-md-2 col-form-label text-md-right">Stok</label>
                            <div class="col-md-6">
                                <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" required autocomplete="stock">
                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="information" class="col-md-2 col-form-label text-md-right">Keterangan</label>
                            <div class="col-md-6">
                                <textarea name="information" class="form-control" @error('information') is-invalid @enderror"></textarea>
                                @error('information')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-2 col-form-label text-md-right">Gambar</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control-file" @error('image') is-invalid @enderror" name="image" required>
                                @error('information')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Anda Yakin Akan Menambah Barang Ini ?')">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
           </div>
        </div>
    </div>
</div>
@endsection
