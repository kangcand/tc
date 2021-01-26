@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Data kecamatan
                </div>
                <div class="card-body">
                    <form action="{{route('kecamatan.update',$kecamatan->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="">Pilih Kota / Kabupaten</label>
                            <select name="id_kota" class="form-control" required>
                                @foreach($kota as $data)
                                    <option value="{{$data->id}}" {{ $data->id ==  $kecamatan->id_kota ? 'selected' : '' }} >{{$data->nama_kota}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama kecamatan</label>
                            <input type="text" name="nama_kecamatan" value="{{$kecamatan->nama_kecamatan}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
