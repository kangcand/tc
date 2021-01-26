@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Show Data kelurahan
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Kecamatan</label>
                        <input type="text" name="kode_kecamatan" value="{{$kelurahan->kecamatan->nama_kecamatan}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Nama kelurahan</label>
                        <input type="text" name="nama_kelurahan" value="{{$kelurahan->nama_kelurahan}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{route('kelurahan.index')}}" class="btn btn-primary btn-block">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
