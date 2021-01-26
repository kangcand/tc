@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Kecamatan
                    <a href="{{route('kecamatan.create')}}"
                       class="btn btn-primary float-right">
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Kecamatan</th>
                                <th>Kota / Kabupaten</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($kecamatan as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->nama_kecamatan}}</td>
                                <td>{{$data->kota->nama_kota}}</td>
                                <td>
                                    <form action="{{route('kecamatan.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('kecamatan.edit',$data->id)}}" class="btn btn-success">Edit</a>
                                        <a href="{{route('kecamatan.show',$data->id)}}" class="btn btn-warning">Show</a>
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


