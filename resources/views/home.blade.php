@php
    $months = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    ];
@endphp

@extends('layouts.app')

@section('template_title')
    Dashboard
@endsection

@section('css')
    <!-- jsvectormap css -->
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
    @if (auth()->user()->role == "admin")
        @include('dashboard.admin')
    @endif
    @if (auth()->user()->role == "customer")
        @include('dashboard.reseller')
    @endif
@endsection

@section('scripts')
<!-- apexcharts -->
<script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- Vector map-->
<script src="{{ URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/jsvectormap/maps/world-merc.js') }}"></script>

{{-- <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script> --}}
<!-- App js -->
<script src="{{ URL::asset('build/js/app.js') }}"></script>

@if (Auth::user()->role == 'customer')
    <script>
        var model =Object.values(@json($comision_month)) 
        
        
        var comisions = model.map(function(item) {
            return item.comision
        });

        var qtys = model.map(function(item) {
            return item.qty
        });

        console.log(qtys);
        console.log(comisions);
        

        // console.log(model);

        var options = {
        series: [
            {
                name: 'Jumlah Komisi',
                data: comisions
            }
        ],
        chart: {
            type: 'bar',
            height: 350,
            stacked: true,
            toolbar: {
                show: false
            },
            zoom: {
                enabled: true
            }
        },

        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '42%'
            },
        },
        dataLabels: {
            enabled: false
        },

        legend: {
            show:false,
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Des' ],
        },
        colors: ['#0c768a'],
        fill: {
            opacity: 1
        }
        };

        var chart = new ApexCharts(document.querySelector("#column-chart"), options);
        chart.render();
    </script>
@endif

{{-- admin script --}}
@if (Auth::user()->role == 'admin')
    <script>
        var admin_price_chart = @json($sales_chart);
        
        var price = [];
        var reseller_price = [];
        var comision = [];
        var qtys = [];

        for (var i = 1; i <= 12 ; i++) {

            var i_num = i.toString();
            if (i_num.length == 1) {
                i_num = '0' + i_num;
            }else{
                i_num = i_num;
            }

            price.push(admin_price_chart[i_num].price ?? 0);
            reseller_price.push(admin_price_chart[i_num].reseller_price ?? 0);
            comision.push(admin_price_chart[i_num].comision ?? 0);
            qtys.push(admin_price_chart[i_num].qty ?? 0);
        }

        var options = {
            chart: {
                height: 350,
                type: 'bar',
                toolbar: {
                show: false,
                }
            },
            plotOptions: {
                bar: {
                horizontal: false,
                columnWidth: '45%',
                endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Pendapatan (Harga Normal)',
                data: price
            }, {
                name: 'Pendapatan (Harga Reseller)',
                data: reseller_price
            }, {
                name: 'Komisi Reseller',
                data: comision
            }],
            colors: ['#ed5e49','#086070','#2651e9'],
            xaxis: {
                categories: ['Jan' ,'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            },
            yaxis: {
                title: {
                text: 'Rp (dalam rupiah)'
                }
            },
            grid: {
                borderColor: '#f1f1f1',
            },
            fill: {
                opacity: 1

            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                        }).format(val);
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#column_chart"),
            options
        );

        chart.render();


        var options = {
            series: [{
                name: 'Penjualan',
                data: qtys
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            colors: ['#086070','#2651e9'],
            xaxis: {
                type: 'string',
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " "+"PCS";
                    }
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#area_chart_spline"), options);
        chart.render();
    </script>
@endif

@endsection

