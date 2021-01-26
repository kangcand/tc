@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Data Provinsi
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Kode Provinsi</label>
                        <input type="text" name="kode_provinsi" value="{{$provinsi->kode_provinsi}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Provinsi</label>
                        <input type="text" name="nama_provinsi" value="{{$provinsi->nama_provinsi}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{route('provinsi.index')}}" class="btn btn-primary btn-block">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
