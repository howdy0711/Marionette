<!DOCTYPE html>
<html lang="ko">
<head>
    
    <meta name="update" content="{{Session::get('cont_name')}}">
    <meta name="name" content="{{Request::input('name')}}">
    <meta name="userData" content="{{Session::get('user_id')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{csrf_token()}}">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{secure_url('css/grid.css')}}">
    <link rel="stylesheet" href="{{secure_url('css/style.css')}}">
    <link rel="stylesheet" href="{{secure_url('css/normalize.css')}}">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{secure_url('js/main.js')}}"></script>
    <script src="{{secure_url('js/List.js')}}"></script>
    <script src="{{secure_url('js/turn.js')}}"></script>
    <script src="{{secure_url('js/tool.js')}}"></script>
    <script src="{{secure_url('js/gif.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> 

</head>
<body>
    <!--000000000000000000000000000000000000000000000000000000000000000000-->
    <div class="" id="contextmenu">
        <style>
            .collection{list-style:none;padding:0;}
        </style>
        <ul class="collection">
            <li class="collection-item motionName">동작이름</li>
            <div class="collection-item contextmenu-body">
            
            </div>
            <!--<li class="list-group-item motionTime">동작시간</li>-->
        </ul>
    </div>

    <div class="tools bg-blue">
        <div class="tools-list">
            <div class="tabpanel bg-blue ">
                <ul class="tab-list item-list" data-id="tools">
                    <li><a href="#preview">컨텐츠</a></li>
                    <li><a href="#recorder">음성녹음</a></li>
                    <li><a href="#fileUpload">파일업로드</a></li>
                    <!--<li><a href="#Play">미리보기</a></li>-->
                    <!--<a href="#closeTools"><span class="text-white glyphicon glyphicon-remove"></span></a>-->
                </ul>
            </div>
        </div>
        <div class="tab-content" data-id="tools">
            <div id="preview">
                <div id="bookPreview">
                    <div class="hard"><img src="{{secure_asset('img/tiger/title.jpg')}}"></img></div>
                    <div class=""><img src="{{secure_asset('img/tiger/last_fox.png')}}"></img></div>
                    <div class=""><img src="{{secure_asset('img/tiger/last_page1.png')}}"></img></div>
                    <div class=""><img src="{{secure_asset('img/tiger/last_tiger.png')}}"></img></div>
                    <div class=""><img src="{{secure_asset('img/tiger/last_page2.png')}}"></img></div>
     
                </div>
            </div>
            <div id="recorder">
                <section class="main-controls">
                    <canvas class="visualizer"></canvas> 
                    <button class="record">Record</button>
                    <button class="stop">Stop</button>
                </section>
                
                <section class="sound-clips">
                </section>
                
                <script src="js/recordingView.js"></script>
            </div>
            <div id="fileUpload">
                <h3>효과음</h3>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" id="effectFile">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="효과음 업로드">
                    </div>
                </div>
                <button id="effectFileBtn" class="btn">효과음 업로드</button>

                <h3>배경음</h3>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" id="bgmFile">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="배경음 업로드">
                    </div>
                </div>
                <button id="bgmFileBtn" class="btn">배경음 업로드</button>
                
            </div>
            <div id="Play">
                <a href="#play">동작 미리보기</a>
            </div>
        </div>
    </div>
    <!--000000000000000000000000000000000000000000000000000000000000000000-->
    <div class="row">
        <div class="col-md-12 header bg-black">
            <div class="header-title text-white">
                DANCING MARIONETTE MAKER
                <!--<a href="#test">saveDB</a>-->
                <!--<a href="#loadTest">loadDB</a>-->
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 bg-blue">
            <div class="tabpanel height1">
                <ul class="tab-list" data-id="motionTab">
                    <li><a href="#motion">동작</a></li>
                    <li><a href="#effect">효과음</a></li>
                    <li><a href="#bgm">배경음</a></li>
                    <li><a href="#delay">딜레이</a></li>
                    <a class="btn" href="#macro">매크로</a>
                </ul>
            </div>
        </div>
        <div class="col-md-5 item-list-wrap">
            <div class="tab-content item-list" data-id="motionTab">
                <div class="" id="motion">
                    <div class="dropdown box-inline">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                            카테고리별 조회
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">모모이야기</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">흥부놀부</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">어린왕자</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">엄마찾아삼만리</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">이빨빠진호랑이</a></li>
                        </ul>
                    </div>
                    <div class="dropdown box-inline">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                            동작추천
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">인사</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">걷기</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">방향지시</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">박수</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">댄스</a></li>
                        </ul>
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                      상세검색
                    </button>
                    
                    @include('makingTool.detailSearchMotion')
                    <div><hr></div>
                    <span id="a" class="item motion" data-id="&13:=0411040F=0307040T=0809050T#0100=0800050T=0709050T#0100=0718050T=0809050T#0100=0800050T=0318050F=0400050T" data-time="4">물건들고 걷기</span>
                    <span id="b" class="item motion" data-id="&14:=0518000F=0600000F#0300=0300045F=0418045T=0500030F=0618030T=0318045F=0400045T=0309045F=0409045T#1000=0318040F=0400040T" data-time="6">양팔돌리고 팔벌리기</span>
                    <span id="c" class="item motion" data-id="&09:=0500000F=0618000T=0415060F=0303060T#1500=0400040F=0318040T=0506000F=0607000F" data-time="2">어흥</span>
                    <span id="d" class="item motion" data-id="&06:=0518000F=0008020F=0304060T=0005020F=0506000F=0318060T" data-time="1">오른손먹기</span>
                    <span id="e" class="item motion" data-id="&06:=0600000F=0008020F=0414060T=0005020F=0607000F=0400060T" data-time="1">왼손먹기</span>
                    <span id="f" class="item motion" data-id="&10:=0008020F=0518000F=0304060F=0600000F=0414060T=0005020F=0607000F=0400060F=0506000F=0318060T" data-time="1">양손먹기</span>
                    <!--<span class="item motion" data-time="4">aa</span>-->
                    <!--<a id="a" class="item motion green lighten-3" data-id="&01:=0900050T" data-time="001">몸통 오른쪽으로</a>-->
                    <!--<a id="b" class="item motion green lighten-3" data-id="&03:=0012020T#0300=0005090T" data-time="002">고개숙여인사</a>-->
                    <!--<a id="c" class="item motion green lighten-3" data-id="&06:=0518000F=0008020F=0304060T=0005020F=0506000F=0318060T" data-time="001">오른손 먹기</a>-->
                    <!--<a id="d" class="item motion green lighten-3" data-id="&06:=0312040F=0518000T=0306070F=0500070T=0318050F=0506000T" data-time="001">오른손 바깥으로</a>-->
                    <!--<a id="e" class="item motion green lighten-3" data-id="&06:=0600000F=0008020F=0414060T=0005020F=0607000F=0400060T" data-time="001">왼손 먹기</a>-->
                    <!--<a id="f" class="item motion green lighten-3" data-id="&08:=0500000T=0300070T=0505060T=0500060T=0505060T=0500060T=0507060T=0318070T" data-time="002">오른손 하늘찌르기</a>-->
                    <!--<a class="item motion green lighten-3" data-id="&09:=0500000F=0618000T=0415060F=0303060T#1500=0400040F=0318040T=0506000F=0607000F" data-time="003">어흥</a>-->
                    <!--<a class="item motion green lighten-3" data-id="&09:=0306035T=0503070T=0511070T=0503070T=0511070T=0503070T=0511070T=0506070T=0318040T" data-time="004">오른팔 흔들기</a>-->
                    <!--<a class="item motion green lighten-3" data-id="&09:=0518000F=0600000F#0300=0300060F=0418060T=0500050F=0618050T=0318060F=0400060T" data-time="002">크게 원 그리기</a>-->
                    <!--<a class="item motion green lighten-3" data-id="&09:=0500000F=0618000T=0413060F=0305060T#1000=0400060F=0318060T=0506000F=0607000T" data-time="002">어깨높이 양손들기</a>-->
                    <!--<a class="item motion green lighten-3" data-id="&09:=0500000F=0618000F=0300090F=0418090T#0200=0506000F=0607000F=0318090F=0400090T" data-time="001">양손 크게들기</a>-->
                    <!--<a class="item motion green lighten-3" data-id="&10:=0008020F=0518000F=0304060F=0600000F=0414060T=0005020F=0607000F=0400060F=0506000F=0318060T" data-time="001">양손 먹기</a>-->
                    <!--<a class="item motion green lighten-3" data-id="&10:=0518000F=0600000F#0300=0304045F=0414045T#0500=0506000F=0607000F=0318060F=0400060T" data-time="002">양손 입앞으로</a>-->
                    <!--<a class="item motion green lighten-3" data-id="&10:=0500000F=0618000T=0413060F=0305060T=0918040T=0400040F=0318040T=0506000F=0607000F=0909050T" data-time="002">양손들고 몸통 왼쪽</a>-->
                    <!--<a class="item motion green lighten-3" data-id="&10:=0903040F=0518000F=0007020F#0600=0915040T#0600=0005020F=0506000F=0318060T=0909050T" data-time="003">오른팔들고 몸 좌 우로</a>-->
                    <!--<a class="item motion green lighten-3" data-id="&13:=0411040F=0307040T=0809050T#0100=0800050T=0709050T#0100=0718050T=0809050T#0100=0800050T=0318050F=0400050T" data-time="004">물건들고 걷기</a>-->
                    <!--<a class="item motion green lighten-3" data-id="&14:=0312055F=0406055T=0500000F=0305080T#0100=0510000F=0311050T=0613000F=0412080T#0100=0603000F=0406050T=0308060F=0400060F" data-time="002">짧은뽑기</a>-->
                    <!--<a class="item motion green lighten-3" data-id="&14:=0518000F=0600000F#0300=0300045F=0418045T=0500030F=0618030T=0318045F=0400045T=0309045F=0409045T#1000=0318040F=0400040T" data-time="005">양팔벌리기</a>-->
                    <!--<a class="item motion green lighten-3" data-id="&17:=0300070F=0418070F=0500050F=0618050F=0900060T=0510050F=0603050F=0918060T=0500050F=0618050F=0900060T=0510050F=0603050F=0918060T=0318050F=0400050F=0909050T" data-time="004">난리치기</a>-->
                    <!--<a class="item motion green lighten-3" data-id="&19:=0518000F=0600000F#0300=0300045F=0418045T=0500030F=0618030T=0309045F=0409045T=0512060F=0601060T=0503060F=0610060T=0512060F=0601060T=0503060F=0610060T=0318050F=0400050T" data-time="006">양손 원그리기</a>-->
                    <!--<a class="item motion green lighten-3" data-id="&20:=0510000F=0603000T=0008010F=0304040F=0414040T#0100=0307020F=0411020T#0100=0304020F=0411020T#0100=0307020F=0411020T#0100=0506000F=0607000F=0318040F=0400040F=0005030T" data-time="002">우는 자세</a>-->
                    <!--<a class="item motion green lighten-3" data-id="&24:=0312055F=0406055T=0500000F=0305080T#0100=0510000F=0311050T=0613000F=0412080T#0100=0603000F=0406050T=0500000F=0305080T#0100=0510000F=0311050T=0613000F=0412080T#0100=0603000F=0406050T=0318070F=0400070F" data-time="003">뽑기</a>-->
                    <!--<a class="item motion green lighten-3" data-id="&32:=0518000F=0600000T=0304045F=0414045T#0500=0506000F=0607000T=0412035F=0306035T=0610070F=0503070T=0602070F=0511070T=0610070F=0503070T=0602070F=0511070T#0500=0500000F=0618000T=0415060F=0303060T#0800=0506000F=0607000T=0400050F=0306035T=0503070T=0511070T=0503070T=0511070T=0318050T" data-time="005">무섭지 않음</a>-->
                </div>

                <div class="" id="effect">
                    
                    
                    <div class="dropdown box-inline">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                            카테고리별 조회
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">사람관련(아이)</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">사람관련(노인)</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">사람관련(성인남자)</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">사람관련(성인여자)</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">자연</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">동물소리</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">집안도구 관련</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">자동차 효과음</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">군중-혼잡</a></li>
                            
                            </ul>
                    </div>
                    <div class="dropdown box-inline">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                            시간별 조회
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">10초 이내</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">7초 이내</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">3초 이내</a></li>
                        </ul>
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#effectModal">
                      상세검색
                    </button>
                    
                    
                    @include('makingTool.detailSearchEffect')
                    <div><hr></div>
                    
                    <!--<span class="item effect" data-time="4">aa</span>-->
                     @foreach($BE_sound as $value)
                    <a class="item effect" data-id="{{$value->file_name}}" data-time="{{$value->time_of_soundfile}}">
                        {{$value->koreanName}}
                    </br>
                    <!--{{$value->time_of_soundfile}}-->
                    </a>
                    @endforeach
                    @foreach($UE_sound as $value)
                    <a class="item effect" data-id="{{$value->file_name}}" data-time="{{$value->time_of_soundfile}}">
                        {{$value->koreanName}}
                    </br>
                    <!--{{$value->time_of_soundfile}}-->
                    </a>
                    @endforeach
                    @foreach($UV_sound as $value)
                    <a class="item effect voice" data-id="{{$value->file_name}}" data-time="{{$value->time_of_soundfile}}">
                        {{$value->koreanName}}
                    </br>
                    <!--{{$value->time_of_soundfile}}-->
                    </a>
                    @endforeach
                </div>

                <div class="" id="bgm">
                    
                    
                    <div class="dropdown box-inline">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                            카테고리별 조회
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">슬픔</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">감동</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">평화</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">희망</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">잔잔</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">고요</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">몽환</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">경쾌</a></li>
                            
                        </ul>
                    </div>
                    <div class="dropdown box-inline">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                            시간별 조회
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">1분 미만</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">1분 이상</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">2분 이상</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">3분 이상</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">5분 이상</a></li>
                        </ul>
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#bgmModal">
                      상세검색
                    </button>
                    
                    
                    @include('makingTool.detailSearchBgm')
                    <div><hr></div>
                    
                    
                    <!--<span class="item bgm" data-time="4">aa</span>-->
                    @foreach($BB_sound as $value)
                    
                    <a class="item bgm" data-id="{{$value->file_name}}" data-time="{{$value->time_of_soundfile}}">{{$value->koreanName}}
                    </br>
                    <!--{{$value->time_of_soundfile}}-->
                    
                    </a>
                    @endforeach
                    @foreach($UB_sound as $value)
                    <a class="item bgm" data-id="{{$value->file_name}}" data-time="10">{{$value->koreanName}}
                    <!--{{$value->time_of_soundfile}}-->
                    </br>
                    <!--{{$value->time_of_soundfile}}-->
                    </a>
                    @endforeach
                </div>

                <div class="" id="delay">
                    <span class="item delay" data-time="4">딜레이</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 define-area-wrap">
            <div class="define-area">
                <div class="define-info">
                    저장할 블럭을 선택해서 화면으로 드래그해주세요.
                </div>
            </div>
            <div class="define-area-menu">
                <ul>
                    <li class=""><a href="#tools"><img src="{{secure_asset('image/new.jpg')}}" alt=""></a></li>
                    <li class=""><a href=""><img src="{{secure_asset('image/refresh.jpg')}}" alt=""></a></li>
                    <li class=""><a href=""><img src="{{secure_asset('image/cancel.jpg')}}" alt=""></a></li>
                    <li class=""><a href="#transferData"><img src="{{secure_asset('image/check.jpg')}}" alt=""></a></li>
                </ul>
            </div>
            
            
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 bg-blue text-white header-title">
            동작 미리보기
        </div>
        <div class="preview-gif">
            
        </div>
        <x-gif src="https://marionette-cloned-marionette.c9users.io/img/gif/test1.gif" controls="tru"></x-gif>
    </div>
    
    <!--<div class="row">-->
    <!--    <div class="col-md-12 bg-blue text-white header-title">-->
    <!--        TIME GAUGE-->
    <!--    </div>-->
    <!--    <div class="col-md-12 timeline-motion time-bar">-->
    <!--        <span class="timeline-title bg-red text-white">-->
    <!--            동작-->
    <!--        </span>-->
    <!--        <span class="default-bar">-->
    <!--            <div class="inner-bar bg-red motion-bar">-->
    <!--                0-->
    <!--            </div>-->
    <!--        </span>-->

            
    <!--    </div>-->
    <!--    <div class="col-md-12 timeline-effect time-bar">-->
    <!--        <span class="timeline-title bg-yellow text-white">-->
    <!--            효과음-->
    <!--        </span>-->
    <!--        <span class="default-bar">-->
    <!--            <div class="inner-bar bg-yellow effect-bar">-->
    <!--                0-->
    <!--            </div>-->
    <!--        </span>-->
    <!--    </div>-->
    <!--    <div class="col-md-12 timeline-bgm time-bar">-->
    <!--        <span class="timeline-title bg-green text-white">-->
    <!--            배경음-->
    <!--        </span>-->
    <!--        <span class="default-bar">-->
    <!--            <div class="inner-bar bg-green bgm-bar">-->
    <!--                0-->
    <!--            </div>-->
    <!--        </span>-->
    <!--    </div>-->
    <!--</div>-->
</body>
</html>
