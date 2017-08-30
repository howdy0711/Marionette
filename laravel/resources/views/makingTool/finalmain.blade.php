<!DOCTYPE html>
<html>
    <head>
        <meta name="userData" content="{{Session::get('user_id')}}">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="{{secure_asset('css/materialize.min.css')}}"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="{{secure_asset('css/master.css')}}"  media="screen,projection"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <script src="{{secure_asset('js/List.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="{{secure_url('js/define.js')}}"></script>
        <script src="{{secure_url('js/tool.js')}}"></script>
        <style>
            .tools{
                display:none;
                width:500px;
                position:absolute;
                z-index:100;
            }
            .tools-contentBox{
                background-color:aliceblue;
                height:500px;
            }
          
        </style>
    </head>

    <body class="red lighten-5">
        <div class="" id="contextmenu">
            <ul class="collection">
                <li class="collection-item motionName">동작이름</li>
                <div class="collection-item contextmenu-body">
                    
                </div>
                <!--<li class="list-group-item motionTime">동작시간</li>-->
            </ul>
        </div>
        <div class="row tools">
            <nav class="nav-extended">
                <div class="nav-wrapper">
                <a href="#" class="brand-logo">Marionette Tools</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="#closeTools">닫기</a></li>
                </ul>
                </div>
                <div class="nav-content">
                <ul class="tabs tabs-transparent">
                    <li class="tab"><a href="#test1">컨텐츠미리보기</a></li>
                    <li class="tab"><a href="#test2">음성녹음</a></li>
                    <li class="tab"><a href="#test3">파일업로드</a></li>
                </ul>
                </div>
            </nav>
            <div id="test1" class="col s12 tools-contentBox">Test 1</div>
            <div id="test2" class="col s12 tools-contentBox">
                <section class="main-controls">
                    <canvas class="visualizer"></canvas> 
                    <button class="record">Record</button>
                    <button class="stop">Stop</button>
                </section>
                
                <section class="sound-clips">
                </section>
                
                <script src="js/recordingView.js"></script>
            </div>
            <div id="test3" class="col s12 tools-contentBox">
                <h5>효과음</h5>
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

                <h5>배경음</h5>
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
        </div>

        <nav class="nav-extended cyan lighten-3 height-top">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo center">동작정의툴</a>
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li><a href="#exam1">시간오래걸리니 이걸 누르세요</a></li>
                </ul>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="#tools">도구</a></li>
                    <li><a href="#reDefine">다시정의</a></li>
                    <li><a href="#dataTransfer">정의완료</a></li>
                </ul>
            </div>

            <div class="nav-content cyan lighten-2">
                    <ul class="tabs tabs-transparent">
                        <li class="tab col s3"><a href="#motion">동작</a></li>
                        <li class="tab col s3"><a href="#effect">효과음</a></li>
                        <li class="tab col s3"><a href="#bgm">배경음</a></li>
                        <li class="tab col s3"><a href="#delay">딜레이</a></li>
                    </ul>
            </div>
        </nav>
        <div class="row">
            <div id="motion" class="col s4 item-list">
                <a class="item motion green lighten-3" data-id="&01:=0900050T" data-time="001">몸통 오른쪽으로</a>
                <a class="item motion green lighten-3" data-id="&03:=0012020T#0300=0005090T" data-time="002">고개숙여인사</a>
                <a class="item motion green lighten-3" data-id="&06:=0518000F=0008020F=0304060T=0005020F=0506000F=0318060T" data-time="001">오른손 먹기</a>
                <a class="item motion green lighten-3" data-id="&06:=0312040F=0518000T=0306070F=0500070T=0318050F=0506000T" data-time="001">오른손 바깥으로</a>
                <a class="item motion green lighten-3" data-id="&06:=0600000F=0008020F=0414060T=0005020F=0607000F=0400060T" data-time="001">왼손 먹기</a>
                <a class="item motion green lighten-3" data-id="&08:=0500000T=0300070T=0505060T=0500060T=0505060T=0500060T=0507060T=0318070T" data-time="002">오른손 하늘찌르기</a>
                <a class="item motion green lighten-3" data-id="&09:=0500000F=0618000T=0415060F=0303060T#1500=0400040F=0318040T=0506000F=0607000F" data-time="003">어흥</a>
                <a class="item motion green lighten-3" data-id="&09:=0306035T=0503070T=0511070T=0503070T=0511070T=0503070T=0511070T=0506070T=0318040T" data-time="004">오른팔 흔들기</a>
                <a class="item motion green lighten-3" data-id="&09:=0518000F=0600000F#0300=0300060F=0418060T=0500050F=0618050T=0318060F=0400060T" data-time="002">크게 원 그리기</a>
                <a class="item motion green lighten-3" data-id="&09:=0500000F=0618000T=0413060F=0305060T#1000=0400060F=0318060T=0506000F=0607000T" data-time="002">어깨높이 양손들기</a>
                <a class="item motion green lighten-3" data-id="&09:=0500000F=0618000F=0300090F=0418090T#0200=0506000F=0607000F=0318090F=0400090T" data-time="001">양손 크게들기</a>
                <a class="item motion green lighten-3" data-id="&10:=0008020F=0518000F=0304060F=0600000F=0414060T=0005020F=0607000F=0400060F=0506000F=0318060T" data-time="001">양손 먹기</a>
                <a class="item motion green lighten-3" data-id="&10:=0518000F=0600000F#0300=0304045F=0414045T#0500=0506000F=0607000F=0318060F=0400060T" data-time="002">양손 입앞으로</a>
                <a class="item motion green lighten-3" data-id="&10:=0500000F=0618000T=0413060F=0305060T=0918040T=0400040F=0318040T=0506000F=0607000F=0909050T" data-time="002">양손들고 몸통 왼쪽</a>
                <a class="item motion green lighten-3" data-id="&10:=0903040F=0518000F=0007020F#0600=0915040T#0600=0005020F=0506000F=0318060T=0909050T" data-time="003">오른팔들고 몸 좌 우로</a>
                <a class="item motion green lighten-3" data-id="&13:=0411040F=0307040T=0809050T#0100=0800050T=0709050T#0100=0718050T=0809050T#0100=0800050T=0318050F=0400050T" data-time="004">물건들고 걷기</a>
                <a class="item motion green lighten-3" data-id="&14:=0312055F=0406055T=0500000F=0305080T#0100=0510000F=0311050T=0613000F=0412080T#0100=0603000F=0406050T=0308060F=0400060F" data-time="002">짧은뽑기</a>
                <a class="item motion green lighten-3" data-id="&14:=0518000F=0600000F#0300=0300045F=0418045T=0500030F=0618030T=0318045F=0400045T=0309045F=0409045T#1000=0318040F=0400040T" data-time="005">양팔벌리기</a>
                <a class="item motion green lighten-3" data-id="&17:=0300070F=0418070F=0500050F=0618050F=0900060T=0510050F=0603050F=0918060T=0500050F=0618050F=0900060T=0510050F=0603050F=0918060T=0318050F=0400050F=0909050T" data-time="004">난리치기</a>
                <a class="item motion green lighten-3" data-id="&19:=0518000F=0600000F#0300=0300045F=0418045T=0500030F=0618030T=0309045F=0409045T=0512060F=0601060T=0503060F=0610060T=0512060F=0601060T=0503060F=0610060T=0318050F=0400050T" data-time="006">양손 원그리기</a>
                <a class="item motion green lighten-3" data-id="&20:=0510000F=0603000T=0008010F=0304040F=0414040T#0100=0307020F=0411020T#0100=0304020F=0411020T#0100=0307020F=0411020T#0100=0506000F=0607000F=0318040F=0400040F=0005030T" data-time="002">우는 자세</a>
                <a class="item motion green lighten-3" data-id="&24:=0312055F=0406055T=0500000F=0305080T#0100=0510000F=0311050T=0613000F=0412080T#0100=0603000F=0406050T=0500000F=0305080T#0100=0510000F=0311050T=0613000F=0412080T#0100=0603000F=0406050T=0318070F=0400070F" data-time="003">뽑기</a>
                <a class="item motion green lighten-3" data-id="&32:=0518000F=0600000T=0304045F=0414045T#0500=0506000F=0607000T=0412035F=0306035T=0610070F=0503070T=0602070F=0511070T=0610070F=0503070T=0602070F=0511070T#0500=0500000F=0618000T=0415060F=0303060T#0800=0506000F=0607000T=0400050F=0306035T=0503070T=0511070T=0503070T=0511070T=0318050T" data-time="005">무섭지 않음</a>
            </div>
            <!-- 효과음  -->
            <div id="effect" class="col s4 item-list">
                @foreach($BE_sound as $value)
                <a class="item effect blue lighten-3" data-id="{{$value->file_name}}" data-time="{{$value->time_of_soundfile}}">
                    {{$value->koreanName}}
                </br>
                <!--{{$value->time_of_soundfile}}-->
                </a>
                @endforeach
                @foreach($UE_sound as $value)
                <a class="item effect blue lighten-3" data-id="{{$value->file_name}}" data-time="{{$value->time_of_soundfile}}">
                    {{$value->koreanName}}
                </br>
                <!--{{$value->time_of_soundfile}}-->
                </a>
                @endforeach
                @foreach($UV_sound as $value)
                <a class="item effect voice blue lighten-3" data-id="{{$value->file_name}}" data-time="{{$value->time_of_soundfile}}">
                    {{$value->koreanName}}
                </br>
                <!--{{$value->time_of_soundfile}}-->
                </a>
                @endforeach
            </div>

            <!-- 배경음  -->
            <div id="bgm" class="col s4 item-list">
                @foreach($BB_sound as $value)
                <a class="item bgm red lighten-2" data-id="{{$value->file_name}}" data-time="{{$value->time_of_soundfile}}">{{$value->koreanName}}
                </br>
                <!--{{$value->time_of_soundfile}}-->
                </a>
                @endforeach
                @foreach($UB_sound as $value)
                <a class="item bgm red lighten-2" data-id="{{$value->file_name}}" data-time="{{$value->time_of_soundfile}}">{{$value->koreanName}}
                </br>
                <!--{{$value->time_of_soundfile}}-->
                </a>
                @endforeach
            </div>

            <!-- 딜레이  -->
            <div id="delay" class="col s4 item-list">
                <a class="item delay red" data-id="delay" data-time="001">지연</a>
            </div>

            <!-- 동작 정의 구역  -->
            <div class="col s8 define-area">
                <div class="define-area-header">
                    <h5 class="center">동작정의구역</h5>
                </div>
            </div>
        </div>
        
        <!--타임라인  -->
        <div class="row">
            <div class="col s12">
                <div class="progress">
                    <span class="total-bar" style="width: 100%;"><span class="total-time">100%[전체]</span></span>
                </div>

                <div class="progress">
                    <span class="motion-bar green" style="width: 0%;"><span class="motion-time">동작</span></span>
                </div>

                <div class="progress">
                    <span class="effect-bar orange" style="width: 0%;"><span class="effect-time">효과음</span></span>
                </div>

                <div class="progress">
                    <span class="bgm-bar red" style="width: 0%;"><span class="bgm-time">배경음</span></span>
                </div>

                <!-- <div class="progress">
                    <span class="blue" style="width: 100%;"><span>100%</span></span>
                </div> -->
            </div>
        </div>



        <!--Import jQuery before materialize.js-->
        
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>