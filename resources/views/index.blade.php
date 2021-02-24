@extends('layouts.front')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="fade-in">
                <div class="jumbotron" style="padding:2rem; width:auto;">
                    <div class="container">
                        <center>
                            <h1 style="font-style: arial">Tracking Covid</h1>
                            <h5>Corona Virus Indonesia Live Data</h5>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="card bg-primary img-card box-primary-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <p class="text-white mb-0">TOTAL POSITIF</p>
                                <h2 class="mb-0 number-font">{{ $positif }}</h2>
                                <p class="text-white mb-0">ORANG</p>
                            </div>
                            <div class="ml-auto"> <img src="https://kawalcorona.com/uploads/sad-u6e.png" width="50"
                                    height="50" alt="Positif"> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card bg-success img-card box-primary-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <p class="text-white mb-0">TOTAL SEMBUH</p>
                                <h2 class="mb-0 number-font">{{ $sembuh }}</h2>
                                <p class="text-white mb-0">ORANG</p>
                            </div>
                            <div class="ml-auto"> <img src="https://kawalcorona.com/uploads/happy-ipM.png" width="50"
                                    height="50" alt="Positif">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card bg-danger img-card box-primary-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <p class="text-white mb-0">TOTAL MENINGGAL</p>
                                <h2 class="mb-0 number-font">{{ $meninggal }}</h2>
                                <p class="text-white mb-0">ORANG</p>
                            </div>
                            <div class="ml-auto"> <img src="https://kawalcorona.com/uploads/emoji-LWx.png" width="50"
                                    height="50" alt="Positif"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                        <br>
                        <div class="row mt-6">
                            <div class="col text-center">
                                <h5 class="font-weight-normal mt-2">POSITIF</h5>
                                <h3 class="text-xxl mb-1 social-content  number-font">{{ $sembuh }}</h3>
                                <p class="mb-0 text-muted"><span class="text-lg font-weight-700"></span>ORANG</p>

                            </div>
                            <div class="col text-center">
                                <h5 class="font-weight-normal mt-2">SEMBUH</h5>
                                <h3 class="text-xxl mb-1 social-content danger number-font">{{ $sembuh }}</h3>
                                <p class="mb-0 text-muted"><span class="text-lg font-weight-700"></span>ORANG</p>

                            </div>
                            <div class="col text-center">
                                <h5 class="font-weight-normal mt-2">MENINGGAL</h5>
                                <h3 class="text-xxl mb-1 social-content  number-font">{{ $meninggal }}</h3>
                                <p class="mb-0 text-muted"><span class="text-lg font-weight-700"></span>ORANG</p>

                            </div>
                            <div class="chart-wrapper">
                                <canvas id="deals" class="chart-dropshadow-success chartjs-render-monitor" hidden=""
                                    height="85" width="0" style="display: block; width: 0px; height: 85px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Kasus Indonesia</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Provinsi</th>
                                        <th>Kode Provinsi</th>
                                        <th>Positif</th>
                                        <th>Sembuh</th>
                                        <th>Meninggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($provinsi as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td><a href="/provinsi/{{ $data->id }}">{{ $data->nama_provinsi }}</a>
                                            </td>
                                            <td>{{ $data->kode_provinsi }}</td>
                                            <td>{{ $data->positif }}</td>
                                            <td>{{ $data->sembuh }}</td>
                                            <td>{{ $data->meninggal }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Kasus Global</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="global">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Negara</th>
                                        <th>Positif</th>
                                        <th>Sembuh</th>
                                        <th>Meninggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($global as $data => $val)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $val['attributes']['Country_Region'] }}</td>
                                            <td>{{ $val['attributes']['Confirmed'] }}</td>
                                            <td>{{ $val['attributes']['Recovered'] }}</td>
                                            <td>{{ $val['attributes']['Deaths'] }}</td>
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
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        var tanggal = <?php echo $casesTanggal; ?>;    var positif = <?php echo $casesPositif; ?>;    var sembuh = <?php echo $casesSembuh; ?>;    var meninggal = <?php echo $casesMeninggal; ?>;    var barChartData = {
            labels: tanggal,
            datasets: [{
                label: 'Positif',
                backgroundColor: "rgba(252, 186, 3)",
                data: positif
            }, {
                label: 'Sembuh',
                backgroundColor: "rgba(11, 212, 64)",
                data: sembuh

            }, {
                label: 'Meninggal',
                backgroundColor: "rgba(227, 69, 25)",
                data: meninggal
            }]
        };

        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Kasus Covid-19 Indonesia'
                }
            }
        });

    </script>


@endsection
