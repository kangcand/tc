@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data kelurahan
                    <a href="{{route('kelurahan.create')}}"
                       class="btn btn-primary float-right">
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>kelurahan</th>
                                <th>Kecamatan</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($kelurahan as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->nama_kelurahan}}</td>
                                <td>{{$data->kecamatan->nama_kecamatan}}</td>
                                <td>
                                    <form action="{{route('kelurahan.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('kelurahan.edit',$data->id)}}" class="btn btn-success">Edit</a>
                                        <a href="{{route('kelurahan.show',$data->id)}}" class="btn btn-warning">Show</a>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


