<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/materialize-custom.css">
    <script src="js/List.js"></script>
    <script src="js/Item.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/tools.js"></script>
    <script src="js/app.js"></script>
    <script src="js/recorder.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/turn.js"></script>
    <script src="{{secure_asset('js/mainApp.js')}}"></script>
    <title>동작정의 툴</title>
    <style type="text/css">
        .previewImg{
            display:none;
        }
        .previewImg img{
            width:100px;
            height:150px;
        }
    </style>
</head>
<body>
    
    <div class="previewImg">
        <img src="" />
    </div>


    <div class="tools">
        <nav class="nav-extended darkturquoise">
            <div class="nav-content darkturquoise">
            <ul class="tabs tabs-transparent darkturquoise">
                <li class="tab"><a href="#booka">컨텐츠표시</a></li>
                <li class="tab"><a href="#recording">녹음</a></li>
                <li class="tab"><a href="#upload">파일업로드</a></li>
            </ul>
            </div>
        </nav>
        <!---->
        <style type="text/css">
            #booka img{
                width:100%;
                height:100%;
            }
        </style>
        <div id="booka" class="col s12 item-list">
            <div id="books">
            <div class="hard"><img src="{{secure_asset('img/tiger/title.jpg')}}"></img></div>
            <div class=""><img src="{{secure_asset('img/tiger/tiger.jpg')}}"></img></div>
            <div class=""><img src="{{secure_asset('img/tiger/page1.png')}}"></img></div>
            <div class=""><img src="{{secure_asset('img/tiger/fox.jpg')}}"></img></div>
            <div class=""><img src="{{secure_asset('img/tiger/page3.png')}}"></img></div>
            <div class=""><img src="{{secure_asset('img/tiger/rabit.jpg')}}"></img></div>
            <div class=""><img src="{{secure_asset('img/tiger/page5.png')}}"></img></div>
            <!--<div class=""><img src="{{secure_asset('image/fairytail2-1.JPG')}}"></img></div>-->
            </div>
        </div>
        <!---->
        <div id="recording" class="col s12 item-list">
            <section class="main-controls">
                <canvas class="visualizer"></canvas> 
                <button class="record">Record</button>
                <button class="stop">Stop</button>
            </section>
            
            <section class="sound-clips">
            </section>
            
            <script src="js/recodingView.js"></script>
        </div>
        <!---->
        <div id="upload" class="col s12 item-list">
            <h4>배경음</h4><br>
            
            
            <input type="radio" name="Bopen_or_close" value='1' id="publicB">
            <label for="public" class="black-text">공개</label>
            
            <input type="radio" name="Bopen_or_close" value='2' id="privateB">
            <label for="private" class="black-text">비공개</label>
            <br>

            <input type="file" name="" id="bgmFile"/><br>    
            <button id="bgmFileBtn">배경음업로드</button><br>
            

            <h4>효과음</h4><br>
            <input type="radio" name="Eopen_or_close" value='1' id="publicE">
            <label for="public" class="black-text">공개</label>
            
            <input type="radio" name="Eopen_or_close" value='2' id="privateE">
            <label for="private" class="black-text">비공개</label>
            <br>

            <input type="file" name="" id="soundFile"/><br>
            <button id="effectFileBtn">효과음업로드</button>
        </div>
    </div>
    

    <div class="wraper">
        <div class="header valign-wrapper row darkturquoise">
            <div class="col s12">
                <nav class="nav-extended">
                    <nav class="nav-wrapper valign-wrapper darkturquoise">
                        <div class="brand-logo center">
                            <!--<img src="https://res.heraldm.com/content/image/2015/09/03/20150903000132_0.jpg" alt="" class="logo">-->
                            <h4>동작정의</h4>
                        </div>
                    </nav>
                    <div class="nav-content">
                        <a href="#return" class="btn right">돌아가기</a>
                        <a href="#done" class="btn right">정의완료</a>
                        <a href="#reset" class="btn right">다시정의</a>
                        <a href="#tools" class="btn left">도구모음</a>
                    </div>
                </nav>
            </div>
        </div>
        <div class="section row">
        
            <div class="col s4">
                <nav class="nav-extended">
                    <div class="nav-content darkturquoise">
                    <ul class="tabs tabs-transparent">
                        <li class="tab"><a href="#motion">동작</a></li>
                        <li class="tab"><a href="#effect">효과음</a></li>
                        <li class="tab"><a href="#bgm">배경음</a></li>
                        <li class="tab"><a href="#delay">지연</a></li>
                    </ul>
                    </div>
                </nav>
                <!--동작 아이템-->
                <div id="motion" class="col s12 item-list">
                    <div class="col s12">
                        <a href="#categoryMotion" class="btn dropdown-button green" data-activates='categoryMotion'>카테고리별 조회</a>
                        <a href="#recomment" class="btn dropdown-button green" data-activates='recomment'>동화별 추천</a>
                        <a href="#SearchDetailMotion" class="btn dropdown-button green">동작상세검색</a>
                        
                        <ul id='categoryMotion' class='dropdown-content'>
                            <li><a href="#!">모모이야기</a></li>
                            <li><a href="#!">흥부놀부</a></li>
                            <li><a href="#!">어린왕자</a></li>
                            <li><a href="#!">엄마찾아삼만리</a></li>
                            <li><a href="#!">이빨빠진호랑이</a></li>
                        </ul>
                        <ul id='recomment' class='dropdown-content'>
                            <li><a href="#!">인사</a></li>
                            <li><a href="#!">걷기</a></li>
                            <li><a href="#!">방향지시</a></li>
                            <li><a href="#!">박수</a></li>
                            <li><a href="#!">댄스</a></li>
                        </ul>
                    <hr>
                        <span class="item motion" id="motion1">인사하기</span>
                        <span class="item motion" id="motion2">손흔들기</span>
                        <span class="item motion" id="motion3">걸어가기</span>
                        <span class="item motion" id="motion4">양손들기</span>
                        <span class="item motion" id="motion5">오른손 흔들기(부정)</span>
                        <span class="item motion" id="motion6">울기</span>
                        <span class="item motion" id="motion7">큰원그리기</span>
                        <span class="item motion" id="motion8">한손으로 먹기</span>
                    </div>
                    @include('marionett.SearchDetailMotion')
                </div>
                <!--효과음 아이템-->
                <div id="effect" class="col s12 item-list">
                    <div class="col s12">
                        <a href="#category" class="btn dropdown-button green" data-activates='category'>카테고리별 조회</a>
                        <a href="#time" class="btn dropdown-button green" data-activates='time'>시간별 조회</a>
                        <a href="#SearchDetailEffect" class="btn dropdown-button green">상세검색</a>
                        
                        <ul id='category' class='dropdown-content'>
                            <li><a href="#!">사람관련(아이)</a></li>
                            <li><a href="#!">사람관련(노인)</a></li>
                            <li><a href="#!">사람관련(성인남자)</a></li>
                            <li><a href="#!">사람관련(성인여자)</a></li>
                            <li><a href="#!">자연</a></li>
                            <li><a href="#!">동물소리</a></li>
                            <li><a href="#!">집안도구 관련</a></li>
                            <li><a href="#!">자동차 효과음</a></li>
                            <li><a href="#!">군중-혼잡</a></li>
                        </ul>
                        <ul id='time' class='dropdown-content'>
                            <li><a href="#!">10초 이내</a></li>
                            <li><a href="#!">7초 이내</a></li>
                            <li><a href="#!">3초 이내</a></li>
                        </ul>
                    </div>
                    <hr>
                    <span class="item effect" id="effect1">또르르르</span>
                    <span class="item effect" id="effect2">띠요오옹</span>
                    <span class="item effect" id="effect3">땀을뻘뻘</span>
                    <span class="item effect" id="effect4">어흥</span>
                    
                    <script type="text/javascript">
                        $(function(){
                            $("#examS").click(function(){
                                $(".effect").hide();
                                $("#effect4").show();
                            });
                            $("ul a").click(function(){
                                $(".effect").show();
                            })
                        });
                    </script>
                    
                    @include('marionett.SearchDetailEffect')
                    @foreach($BE_sound as $value)
                    <span class="item effect" id="{{$value->file_name}}">{{$value->koreanName}}
                    </br>
                    <!--{{$value->time_of_soundfile}}-->
                    </span>
                    @endforeach
                    @foreach($UE_sound as $value)
                    <span class="item effect" id="{{$value->file_name}}">{{$value->koreanName}}
                    </br>
                    <!--{{$value->time_of_soundfile}}-->
                    </span>
                    @endforeach
                    @foreach($UV_sound as $value)
                    <span class="item effect uv" id="{{$value->file_name}}" >{{$value->koreanName}}
                    </br>
                    <!--{{$value->time_of_soundfile}}-->
                    </span>
                    @endforeach
                </div>
                <!--배경음 아이템-->
                <div id="bgm" class="col s12 item-list">
                    <div class="col s12">
                        <a href="#categoryBgm" class="btn dropdown-button green" data-activates='categoryBgm'>카테고리별 조회</a>
                        <a href="#timeBgm" class="btn dropdown-button green" data-activates='timeBgm'>시간별 조회</a>
                        <a href="#SearchDetailBgm" class="btn" data-activates='SearchDetailBgm'>상세검색</a>
                        <ul id='categoryBgm' class='dropdown-content'>
                            <li><a href="#!">슬픔</a></li>
                            <li><a href="#!">감동</a></li>
                            <li><a href="#!">평화</a></li>
                            <li><a href="#!">희망</a></li>
                            <li><a href="#!">잔잔</a></li>
                            <li><a href="#!">고요</a></li>
                            <li><a href="#!">몽환</a></li>
                            <li><a href="#!">경쾌</a></li>
                        </ul>
                        <ul id='timeBgm' class='dropdown-content'>
                            <li><a href="#!">1분 미만</a></li>
                            <li><a href="#!">1분 이상</a></li>
                            <li><a href="#!">2분 이상</a></li>
                            <li><a href="#!">3분 이상</a></li>
                            <li><a href="#!">5분 이상</a></li>
                        </ul>
                    <hr>
                    </div>
                    @include('marionett.SearchDetailBgm')
                    @foreach($BB_sound as $value)
                    <span class="item bgm" id="{{$value->file_name}}" >{{$value->koreanName}}
                    </br>
                    <!--{{$value->time_of_soundfile}}-->
                    </span>
                    @endforeach
                    @foreach($UB_sound as $value)
                    <span class="item bgm" id="{{$value->file_name}}" data-timeValue="{{$value->time_of_soundfile}}">{{$value->koreanName}}
                    </br>
                    <!--{{$value->time_of_soundfile}}-->
                    </span>
                    @endforeach
                </div>
                <div id="delay" class="col s12 item-list">
                    <span class="item delay">지연</span>
                </div>
            </div>


            <div class="col s8 define-area"></div>
            
        </div>
        <div class="row">
            <div class="col s12">
            </div>
        </div>
        <div class="footer row">

            <nav class="nav-extended">
                    <div class="nav-content darkturquoise">
                    <ul class="tabs tabs-transparent">
                        <li class="tab"><a href="#timeline">타임라인</a></li>
                    </ul>
                    </div>
                </nav>
                <div id="timeline" class="col s12 item-list">
                    <div class="col s1">
                        <div class="allTimeTitle time right-align">전체시간</div>
                        <div class="motionTitle time right-align">동작</div>
                        <div class="effectTitle time right-align">효과음</div>
                        <div class="bgmTitle time right-align">배경음</div>
                    </div>
                    <div class="col s10">
                        <div class="allTimeBar bar"></div>
                        <div class="motionBar bar"></div>
                        <div class="effectBar bar"></div>
                        <div class="bgmBar bar"></div>
                    </div>
                    <div class="col s1">
                        <div class="allTimeCount time"></div>
                        <div class="motionCount time"></div>
                        <div class="effectCount time"></div>
                        <div class="bgmCount time"></div>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>