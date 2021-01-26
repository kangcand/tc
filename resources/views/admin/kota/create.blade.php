@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Data kota
                </div>
                <div class="card-body">
                    <form action="{{route('kota.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Pilih Provinsi</label>
                            <select name="id_provinsi" class="form-control" required>
                                @foreach($provinsi as $data)
                                    <option value="{{$data->id}}">{{$data->nama_provinsi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kode Kota</label>
                            <input type="text" name="kode_kota" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kota / Kabupaten</label>
                            <input type="text" name="nama_kota" class="form-control" required>
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
