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
                    <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fas fa-shopping-cart"></i> Riwayat Pemesanan</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Jumlah Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $order->date }}</td>
                                <td>
                                    @if ($order->status == 1)
                                        Sudah Pesan dan Belum Dibayar
                                    @else
                                        Sudah Dibayar
                                    @endif
                                </td>
                                <td>Rp {{ number_format($order->total_price + $order->code) }}</td>
                                <td><a href="{{ url('history') }}/{{ $order->id }}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a></td>
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
