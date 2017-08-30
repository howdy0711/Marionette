@extends('layouts.adminmaster')
@section('content')

<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="/">HOME</a></li>
                        <li><a href="/adminmain">관리자 메인</a></li>
                        <li><a class="menu-top-active" href="/ContSales">매출 현황</a></li>
                        <li><a href="/logout">로그아웃</a></a></li>
                    </ul>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
    <!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>매출현황</h2>
                        </div>
                        <div class="panel-body">
                       <div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
                  
                            </div>
                            </div>
                    </div>
                    </div>
<div class="col-md-12">
     <!--   Basic Table  -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>판매량</h4>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      
                        <tr>
                            <th>  <h4>구분</h4></th>
                            <th><h4>판매량</h4></th>
                            <th><h4>판매금액</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><h4>동화</h4></td>
                            <td id="fairytale"><h4>{{$fairytale_sale}}</h4></td>
                            <td><h4>{{$fairytale_sale*12000}}</h4></td>
                        </tr>
                        <tr>
                            <td><h4>동요</h4></td>
                            <td id="childrenSong"><h4>{{$childrenSong_sale}}</h4></td>
                            <td><h4>{{$childrenSong_sale*12000}}</h4></td>
                        </tr>
                        <tr>
                            <td><h4>영어</h4></td>
                            <td id="english"><h4>{{$English_sale}}</h4></td>
                            <td><h4>{{$English_sale*12000}}</h4></td>
                        </tr>
                    </tbody>
                    </h4>
                </table>
            </div>
        </div>
    </div>
      <!-- End  Basic Table  -->
</div>

<script type="text/javascript">
    var fairytale = parseInt($("#fairytale").text());
    var childrenSong = parseInt($("#childrenSong").text());
    var english = parseInt($("#english").text());
    var total = fairytale + childrenSong + english
    Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: '컨텐츠별 매출현황'
    },
    subtitle: {
        text: '마리오네트'
    },
    xAxis: {
        categories: ['전체판매량', '동화', '동요', '영어'],
        title: {
            text: null
        },
        
    },
    yAxis: {
        tickInterval: 1,
        // display:none,
        min: 0,
        max:total+1,
        
        title: {
            text: '컨텐츠 수',
            align: 'high'
        },
        labels: {
            overflow: 'justify',
            distance:10000
            
        },

        
    },
    tooltip: {
        valueSuffix: ' 개'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    
    credits: {
        enabled: false
    },
    series: [{
        name:' ',
        data: [total,fairytale,childrenSong,english]
    }]
});
</script>        
        
@endsection