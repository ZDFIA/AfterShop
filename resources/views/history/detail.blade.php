@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href=" {{ url('history') }} " class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ url('/') }} ">Home</a></li>
                    <li class="breadcrumb-item"><a href=" {{ url('history') }} ">Riwayat Pemesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Detail Pemesanan</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Sukses Check Out</h3>
                    <h5>Pesanan anda sudah sukses dicheckout, selanjutnya untuk pembayaran silahkan transfer ke <strong>Bank BNI Nomer Rekening : 0733967372</strong> dengan nominal : <strong>Rp {{ number_format($order->total_price + $order->code) }}</strong></h5>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h3><i class="fas fa-info-circle"></i> Detail Pemesanan</h3>
                    @if (!empty($order))
                        <p align="right">Tanggal Pesan : {{ $order->date }}</p>
                    <table class="table table-bordered" align="center">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_details as $order_detail)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td align="left">{{ $order_detail->item->name }}</td>
                                    <td>{{ $order_detail->total }}</td>
                                    <td>Rp {{ number_format($order_detail->item->price) }}</td>
                                    <td>Rp {{ number_format($order_detail->total_price) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" align="right"><strong>Total Harga :</strong></td>
                                <td align="right"><strong>Rp {{ number_format($order->total_price) }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right"><strong>Kode Unik :</strong></td>
                                <td align="right"><strong>Rp {{ number_format($order->code) }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right"><strong>Total Harga yang Harus Dibayar :</strong></td>
                                <td align="right"><strong>Rp {{ number_format($order->total_price + $order->code) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
