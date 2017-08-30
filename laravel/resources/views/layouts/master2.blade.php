<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{secure_asset('css/materialize.css')}}">
    <link rel="stylesheet" href="{{secure_asset('css/main.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="{{secure_asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{secure_asset('js/materialize.min.js')}}"></script>
    <script src="{{secure_asset('js/mainApp.js')}}"></script>
    @yield('assets')
    <title>우리들의 마리오네트 이야기</title>
</head>
<body>
    @include('layouts.sideNav')
    <nav class="nav-extended cyan lighten-3">
            <div class="nav-background">
                <div class="bg-img" style="background-image: url('{{secure_asset('image/icon-seamless.png')}}');"></div>
            </div>
            <div class="nav-wrapper ">
                <a href="#" data-activates="sideNav" class="button-collapse sideNavBtn large"><i class="material-icons menu-icon large">menu</i></a>
                <a href="{{secure_url('/')}}" class="brand-logo"><i class="material-icons">home</i>KingGaiz Team</a>
                
                
                <ul class="right hide-on-med-and-down">
                    @if(!Session::has('user_name'))
                    <li><a href="{{secure_url('/')}}">홈</a></li>
                    <li><a href="{{secure_url('intro')}}">소개</a></li>
                    <li><a href="{{secure_url('login')}}">로그인</a></li>
                    <li><a href="{{secure_url('registerView')}}">회원가입</a></li>
                    @else
                    
                    <li><a href="">{{Session::get('user_name')}}님 로그인 하셨습니다.</a></li>
                    
                    <li><a href="{{secure_url('logout')}}">로그아웃</a></li>
                    <li><a href="{{secure_url('myInfo')}}">내 정보</a></li>
                    @endif
                </ul>
                
                <div class="nav-header center">
                    <h1>우리들의 마리오네트 이야기</h1>
                    <div class="subTitle">아이들과 함께 새로운 이야기를 만들어 나가보세요</div>
                </div>
            </div>
        <nav class="nav-extended  darkturquoise lighten-1 custom-height">
            <div class="nav-wrapper">
                <ul class="lnb">
                    @yield('lnb')
                </ul>
            </div>
        </nav>
    </nav>
    <div class="row"></div><div class="row"></div>
    
    <!--컨텐츠 삽입 부분-->
    @yield('content')

    <!--Footer-->
    @include('layouts.footer')
</body>

</html>