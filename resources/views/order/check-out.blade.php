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
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card-body">
                <h3><i class="fas fa-shopping-cart"></i> Check Out</h3>
                @if (!empty($order))
                    <p align="right">Tanggal Pesan : {{ $order->date }}</p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_details as $order_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $order_detail->item->name }}</td>
                                <td>{{ $order_detail->total }}</td>
                                <td>Rp {{ number_format($order_detail->item->price) }}</td>
                                <td>Rp {{ number_format($order_detail->total_price) }}</td>
                                <td>
                                    <form action="{{ url('check-out') }}/{{ $order_detail->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Akan Menghapus Barang ini ?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" align="right"><strong>Total Harga</strong></td>
                            <td><strong>Rp {{ number_format($order->total_price) }}</strong></td>
                            <td>
                                <a href="{{ url('check-out/confirm') }}" class="btn btn-warning" onclick="return confirm('Anda Yakin Akan Check Out ?')"><i class="fas fa-shopping-cart"></i> Check Out</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
