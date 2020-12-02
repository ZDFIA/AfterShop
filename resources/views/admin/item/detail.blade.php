@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href=" {{ url('item') }} " class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ url('/') }} ">Home</a></li>
                    <li class="breadcrumb-item"><a href=" {{ url('item') }} ">Data Barang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Barang ({{ $item->name }})</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-3 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ url('uploads') }}\{{ $item->image }}" class="rounded mx-auto d-block" width="100%" alt="">
                        </div>
                        <div class="col-md-6 mt-5">
                            <h2><i class="fas fa-box-open"></i> Detail Barang ({{ $item->name }})</h2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp {{ number_format($item->price) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td>{{ $item->stock }}</td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td>{{ $item->information }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><a href="{{ url('item/edit') }}/{{ $item->id }}" class="btn btn-success"><i class="fas fa-pencil-alt"></i> Edit</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-body">
                    <h4><i class="fas fa-pen-alt"></i> Edit Detail Barang</h4>
                     <form method="POST" action="{{ url('item/detail') }}/{{ $item->id }}">
                        @csrf
                        <div class="form-group row">
                             <label for="name" class="col-md-2 col-form-label text-md-right">Nama</label>
                             <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $item->name }}" required autocomplete="name" autofocus>
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
                                 <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $item->price }}" required autocomplete="price">
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
                                 <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ $item->stock }}" required autocomplete="stock">
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
                                 <textarea name="information" class="form-control" @error('information') is-invalid @enderror">{{ $item->information }}</textarea>
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
                                 <button type="submit" class="btn btn-primary" onclick="return confirm('Anda Yakin Akan Mengubah Detail Barang Ini ?')">Save</button>
                             </div>
                         </div>
                     </form>
                 </div>
            </div>
         </div>
    </div>
</div>
@endsection
