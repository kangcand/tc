@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Show Data Kecamatan
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Kota / Kabupaten</label>
                        <input type="text" name="kode_kota" value="{{$kecamatan->kota->nama_kota}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Nama kecamatan</label>
                        <input type="text" name="nama_kecamatan" value="{{$kecamatan->nama_kecamatan}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{route('kota.index')}}" class="btn btn-primary btn-block">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
