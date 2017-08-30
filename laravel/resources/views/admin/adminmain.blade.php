@extends('layouts.adminmaster')
@section('content')
<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="/">HOME</a></li>
                        <li><a class="menu-top-active" href="/adminmain">관리자 메인</a></li>
                        <li><a href="/ContSales">매출 현황</a></li>
                        <li><a href="/logout">로그아웃</a></a></li>
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
                <h4 class="page-head-line">관리자페이지</h4>
            </div>
        </div>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">
            <h3>컨텐츠 정보</h3>    
            </div>
        </div>
    </div>
            <div class="row">
                 <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <span class="fa dashboard-div-icon"><h1>{{$cont_UR_count}}</h1></span>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            </div>
                        </div>
                         <h1>미검토 컨텐츠 </h1>
                    </div>
                </div>
                 <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-two">
                        <span class="fa dashboard-div-icon"><h1>{{$cont_R_count}}</h1></span>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                            </div>
                        </div>
                         <h1>컨텐츠 등록수</h1>
                    </div>
                </div>

            </div>
           
            <div class="row">
<div class="col-md-6">
    <div class="notice-board">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>최근 미검토 컨텐츠</h3>
                <div class="pull-right" >
                    <div class="dropdown">

                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Refresh</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <ul> @foreach($contentUnReviewed as $cont)
                    <li>
                       
                        <a href="/Unreviewed?name={{$cont->cont_name}}">
                            <span class="glyphicon glyphicon-comment  text-warning" ></span>  
                            {{$cont->cont_name}}
                            <span class="label label-info" > {{$cont->cont_category}}</span>
                        </a>
                        
                    </li>@endforeach
                </ul>
            </div>
            <div class="panel-footer">
            <!--<a href="#" class="btn btn-default btn-block"> <i class="glyphicon glyphicon-repeat"></i> Just A Small Footer Button</a>-->
            </div>
        </div>
    </div>
    <hr />
</div>
<div class="col-md-6">
    <div class="notice-board">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3>검토된 컨텐츠</h3> 
                <div class="pull-right" >
                    <div class="dropdown">
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Refresh</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <ul>@foreach($contentReviewed as $cont)
                    <li>
                        
                        <a href="/Reviewed?name={{$cont->cont_name}}">
                            <span class="glyphicon glyphicon-comment  text-warning" ></span>  
                            {{$cont->cont_name}}
                            <span class="label label-info" > {{$cont->cont_category}}</span>
                        </a>
                        
                    </li>@endforeach
                </ul>
            </div>
            <div class="panel-footer">
            <!--<a href="#" class="btn btn-default btn-block"> <i class="glyphicon glyphicon-repeat"></i> Just A Small Footer Button</a>-->
            </div>
        </div>
    </div>
    <hr />
</div>

@endsection