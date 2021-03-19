@extends('layouts.master')
@section('content')
    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                <div class="fade-in">
                    <div class="row">
                        <div class="col-sm-6 col-lg-4">
                            <div class="card text-white bg-primary">
                                <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="text-value-lg">{{ $positif }}</div>
                                        <div>Orang Positif</div>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-transparent dropdown-toggle p-0" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg class="c-icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                    <canvas class="chart" id="card-chart1" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-sm-6 col-lg-4">
                            <div class="card text-white bg-info">
                                <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="text-value-lg">{{ $sembuh }}</div>
                                        <div>Orang Sembuh</div>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-transparent dropdown-toggle p-0" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg class="c-icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                                href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a
                                                class="dropdown-item" href="#">Something else here</a></div>
                                    </div>
                                </div>
                                <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                    <canvas class="chart" id="card-chart2" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="card text-white bg-danger">
                                <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="text-value-lg">{{ $meninggal }}</div>
                                        <div>Orang Meninggal</div>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-transparent dropdown-toggle p-0" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg class="c-icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                                href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a
                                                class="dropdown-item" href="#">Something else here</a></div>
                                    </div>
                                </div>
                                <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                    <canvas class="chart" id="card-chart4" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
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
        </main>
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
