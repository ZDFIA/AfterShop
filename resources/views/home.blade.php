@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <img src="{{ url('images/logo.png') }}" class="rounded mx-auto d-block" width="300" alt="">
        </div>
        @foreach($items as $item)
        <div class="col-md-4">
            <div class="card mt-5">
              <img src="{{ url('uploads') }}/{{ $item->image }}" width="100" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $item->name }}</h5>
                <p class="card-text">
                    <strong>Harga :</strong> Rp. {{ number_format($item->price)}} <br>
                    <strong>Stok :</strong> {{ $item->stock }} <br>
                    <hr>
                    <strong>Keterangan :</strong> <br>
                    {{ $item->information }}
                </p>
                <a href="{{ url('order') }}/{{ $item->id }}" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Pesan</a>
              </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
