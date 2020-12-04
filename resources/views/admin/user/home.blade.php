@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href=" {{ route('home') }} " class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fas fa-user"></i> Data Pengguna</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No.Hp</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (!empty($user->hp))
                                        {{ $user->hp }}
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ url('user/status') }}/{{ $user->id }}" method="post">
                                        @csrf
                                        <input class="form-control" type="hidden" name="id" value="{{ $user->name }}">
                                        <select name="status" id="status" class="form-control">
                                            @if ($user->status == 1)
                                                <option value="1">Admin</option>
                                                <option value="0">User</option>
                                            @else
                                                <option value="0">User</option>
                                                <option value="1">Admin</option>
                                            @endif
                                        </select>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ url('user') }}/{{ $user->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ url('user') }}/{{ $user->id }}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus Pengguna Ini ?')"><i class="fa fa-trash"></i></button>
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
