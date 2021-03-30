@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data users
                        <a href="{{ route('users.create') }}" class="btn btn-primary float-right">
                            Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($user as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>
                                                @if($data->role === "Admin")
                                                <button class="btn btn-sm btn-primary">{{ $data->role }}</button>
                                                @else
                                                <button class="btn btn-sm btn-warning">{{ $data->role }}</button>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('users.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('users.edit', $data->id) }}"
                                                        class="btn btn-success">Edit</a>
                                                    <a href="{{ route('users.show', $data->id) }}"
                                                        class="btn btn-warning">Show</a>
                                                    @if($data->role == "Admin")
                                                    @else
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('apakah anda yakin ?')">Delete</button>
                                                    @endif
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
    </div>
@endsection
