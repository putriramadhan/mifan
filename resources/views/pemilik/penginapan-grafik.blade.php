@extends('sb-admin/app')
@section('title', 'Grafik')
@section('grafikpenginapan', 'active')
@section('daftargrafik', 'show')
@section('daftargrafik-active', 'active')

@section('content')

    <!-- Page Heading -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Grafik Penginapan Bulanan</div>
                    <div class="card-body">
                        <div id="grafik"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">

    var transaksipenginapan = <?php echo json_encode($total) ?>;
    var bulan = <?php echo json_encode($bulan) ?>;
    Highcharts.chart('grafik', {
        title : {
            text: 'Grafik Pendapatan Penginapan'
        },
        xAxis : {
            categories : bulan
        },
        yAxis : {
            title:{
                text : 'Nominal Pendapatan Bulanan'
                }
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [
        {
            name: 'Nominal Pendapatan',
            data: transaksipenginapan
        }
        ]

    });
</script>
@endsection

