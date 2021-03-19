@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Laporan Provinsi
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/report-provinsi') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Tanggal Awal</label>
                                        <input type="date" name="awal" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Tanggal Akhir</label>
                                        <input type="date" name="akhir" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" style="padding: 10px;">
                                        <br>
                                        <button class="btn btn-success btn-outline">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Provinsi</th>
                                        <th>Positif</th>
                                        <th>Sembuh</th>
                                        <th>Meninggal</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($provinsi)
                                        @php $no =1; @endphp
                                        @foreach ($provinsi as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->nama_provinsi }}</td>
                                                <td>{{ $data->positif }}</td>
                                                <td>{{ $data->sembuh }}</td>
                                                <td>{{ $data->meninggal }}</td>
                                                <td>{{ date('d M Y', strtotime($data->tanggal)) }}</td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
