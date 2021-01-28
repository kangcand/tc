@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Show Data rw
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Kelurahan</label>
                        <input type="text" name="kode_kelurahan" value="{{$rw->kelurahan->nama_kelurahan}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Rukun Warga</label>
                        <input type="text" name="nama_rw" value="{{$rw->nama_rw}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{route('rw.index')}}" class="btn btn-primary btn-block">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
