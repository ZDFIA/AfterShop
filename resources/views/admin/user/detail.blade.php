@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href=" {{ url('user') }} " class="btn btn-primary"><i class="fas fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ url('/') }} ">Home</a></li>
                    <li class="breadcrumb-item"><a href=" {{ url('user') }} ">Data Pengguna</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail User ({{ $user->name }})</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                <h4><i class="fa fa-user"></i> Detail User ({{ $user->name }})</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td width="10">:</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>No. Hp</td>
                            <td>:</td>
                            <td>{{ $user->hp }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $user->address }}</td>
                        </tr>
                    </tbody>
                </table>
               </div>
           </div>
        </div>
    </div>
</div>
@endsection
