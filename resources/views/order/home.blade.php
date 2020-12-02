@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href=" {{ url('/') }} " class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ url('/') }} ">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $item->name }}</li>
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
                            <h2>{{ $item->name }}</h2>
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
                                        <form action="{{ url('order') }}/{{ $item->id }}" method="POST">
                                            @csrf
                                            <td><label for="total_order">Jumlah Pesan</label></td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="total_order" id="total_order" class="form-control" required>
                                                <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-shopping-cart"></i> Beli</button>
                                            </td>
                                        </form>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
