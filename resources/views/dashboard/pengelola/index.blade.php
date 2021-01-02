@extends('layouts.admin')

@section('content')
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card table-card">
                            <div class="card-header">
                                <h5>Dashbaord</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li class="first-opt"><i
                                                class="feather icon-chevron-left open-card-option"></i>
                                        </li>
                                        <li><i class="feather icon-maximize full-card"></i></li>
                                        <li><i class="feather icon-minus minimize-card"></i>
                                        </li>
                                        <li><i class="feather icon-refresh-cw reload-card"></i>
                                        </li>
                                        <li><i class="feather icon-trash close-card"></i></li>
                                        <li><i
                                                class="feather icon-chevron-left open-card-option"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block p-b-0">
                                <div class="container">
                                    <div class="table-responsive">
                                        <h4 class="alert-heading text-center"><strong>{{session('success')}}</strong></h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div id="chartJK"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="statDesa"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
    Highcharts.chart('chartJK', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Statistik Desa'
    },
    subtitle: {
        text: 'Berdasarkan Jenis Kelamin Kepala Keluarga'
    },
    xAxis: {
        categories: [
            'Kepala Keluarga'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah kepala keluarga'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Laki-Laki',
        data: {!!json_encode($data)!!}

    }, {
        name: 'Perempuan',
        data: [83.6]

    }]
});
</script>

<script>
    Highcharts.chart('statDesa', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Grafik Statistik Desa'
        },
        subtitle: {
        text: 'Berdasarkan Jenis Kelamin Kependudukan'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Laki-Laki',
                y: {!! json_encode($data) !!}
            }, {
                name: 'Perempuan',
                y: 11.84
            }]
        }]
    });
</script>
@endsection