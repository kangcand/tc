@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data kasus
                    <a href="{{route('kasus.create')}}"
                       class="btn btn-primary float-right">
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Lokasi</th>
                                    <th>Jumlah Reaktif</th>
                                    <th>Jumlah Positif</th>
                                    <th>Jumlah Sembuh</th>
                                    <th>Jumlah Meninggal</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($kasus as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>
                                        RW <b>{{$data->rw->nama_rw}}</b>, {{$data->rw->kelurahan->nama_kelurahan}}<br>
                                        {{$data->rw->kelurahan->kecamatan->nama_kecamatan}}<br> {{$data->rw->kelurahan->kecamatan->kota->nama_kota}},
                                        {{$data->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi}}
                                    </td>
                                    <td>{{$data->reaktif}}</td>
                                    <td>{{$data->positif}}</td>
                                    <td>{{$data->sembuh}}</td>
                                    <td>{{$data->meninggal}}</td>
                                    <td>{{$data->tanggal}}</td>
                                    <td>
                                        <form action="{{route('kasus.destroy',$data->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('kasus.edit',$data->id)}}" class="btn btn-success">Edit</a>
                                            <a href="{{route('kasus.show',$data->id)}}" class="btn btn-warning">Show</a>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?')">Delete</button>
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


