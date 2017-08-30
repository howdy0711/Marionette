<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="userData" content="{{Session::get('user_id')}}">
    <title>동작정의</title>
    <link rel="stylesheet" href="{{secure_asset('css/bootstrap.css')}}" type="text/css" />
    <script type="text/javascript" src="{{secure_asset('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{secure_asset('js/bootstrap.js')}}"></script>
    <script src="{{secure_asset('js/List.js')}}"></script>
    <script src="{{secure_asset('js/jquery-ui.js')}}"></script>
    <script src="{{secure_asset('js/recorder.js')}}"></script>
    <script src="{{secure_asset('js/turn.js')}}"></script>
    <script src="{{secure_asset('js/tool.js')}}"></script>
    <link rel="stylesheet" href="{{secure_asset('css/myCustom.css')}}" type="text/css" />
    
</head>
<body>
    <nav class="navbar navbar-inverse custom-navbar">
        <div class="navbar-header">
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                
                <li><a href="#exam1">EXAM1</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#tools">도구</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">메뉴 <span class="caret"></span></a>
                    <ul class="dropdown-menu navbar-right" role="menu">
                        <li><a href="#transferData">정의완료</a></li>
                        <li><a href="#">다시정의</a></li>
                        <li class="divider"></li>
                        <li><a href="#">돌아가기</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    <div class="row">
        @include('makingTool.modals')
        @include('makingTool.tools')
        
        
        <!--동작 리스트(배경음, 효과음, 딜레이)-->
        <div class="col-md-4 define-list">
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#motion" aria-controls="motion" role="tab" data-toggle="tab">동작</a></li>
                    <li role="presentation"><a href="#effect" aria-controls="effect" role="tab" data-toggle="tab">효과음</a></li>
                    <li role="presentation"><a href="#bgm" aria-controls="bgm" role="tab" data-toggle="tab">배경음</a></li>
                    <li role="presentation"><a href="#delay" aria-controls="delay" role="tab" data-toggle="tab">지연</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!--여기는 동작-->
                    <div role="tabpanel" class="tab-pane active" id="motion">
                        <!--카테고리 영역-->
                        <div class="tabpanel-header">
                            <!--카테고리별 조회-->
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    카테고리별 조회 <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#!">인사</a></li>
                                    <li><a href="#!">걷기</a></li>
                                    <li><a href="#!">방향지시</a></li>
                                    <li><a href="#!">박수</a></li>
                                    <li><a href="#!">댄스</a></li>
                                </ul>
                            </div>
                            
                            <!--동화별 추천-->
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    동화별 추천 <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#!">모모이야기</a></li>
                                    <li><a href="#!">흥부놀부</a></li>
                                    <li><a href="#!">어린왕자</a></li>
                                    <li><a href="#!">엄마찾아삼만리</a></li>
                                    <li><a href="#!">이빨빠진호랑이</a></li>
                                </ul>
                            </div>
                            
                            <!--상세검색-->
                            <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">
                                동작 상세검색
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">동작상세검색</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="checkbox col-md-6">
                                                <label>
                                                    <input type="checkbox" id="children" name="effectCategory"> 인사
                                                </label>
                                                <label>
                                                    <input type="checkbox" id="children" name="effectCategory"> 박수
                                                </label>
                                                <label>
                                                    <input type="checkbox" id="children" name="effectCategory"> 걷기
                                                </label>
                                                <label>
                                                    <input type="checkbox" id="children" name="effectCategory"> 댄스
                                                </label>
                                                <label>
                                                    <input type="checkbox" id="children" name="effectCategory"> 방향지시
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                                        <button type="button" class="btn btn-primary">검색</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                            <hr>
                        </div>
                        <!--실제 동작들 영역-->
                        <div class="itemList">
                            <a class="btn btn-success item motion" data-id="&09:=0500000F=0618000T=0415060F=0303060T#1500=0400040F=0318040T=0506000F=0607000F" data-time="003">
                                어흥
                            </a>
                            <a class="btn btn-success item motion" data-id="&08:=0500000T=0300070T=0505060T=0500060T=0505060T=0500060T=0507060T=0318070T" data-time="002">
                                오른손 하늘찌르기
                            </a>
                            <a class="btn btn-success item motion" data-id="&20:=0510000F=0603000T=0008010F=0304040F=0414040T#0100=0307020F=0411020T#0100=0304020F=0411020T#0100=0307020F=0411020T#0100=0506000F=0607000F=0318040F=0400040F=0005030T" data-time="002">
                                우는 자세
                            </a>
                            <a class="btn btn-success item motion" data-id="&14:=0312055F=0406055T=0500000F=0305080T#0100=0510000F=0311050T=0613000F=0412080T#0100=0603000F=0406050T=0308060F=0400060F" data-time="002">
                                짧은뽑기
                            </a>
                            <a class="btn btn-success item motion" data-id="&24:=0312055F=0406055T=0500000F=0305080T#0100=0510000F=0311050T=0613000F=0412080T#0100=0603000F=0406050T=0500000F=0305080T#0100=0510000F=0311050T=0613000F=0412080T#0100=0603000F=0406050T=0318070F=0400070F" data-time="003">
                                뽑기
                            </a>
                            <a class="btn btn-success item motion" data-id="&09:=0306035T=0503070T=0511070T=0503070T=0511070T=0503070T=0511070T=0506070T=0318040T" data-time="004">
                                오른팔 흔들기
                            </a>
                            <a class="btn btn-success item motion" data-id="&19:=0518000F=0600000F#0300=0300045F=0418045T=0500030F=0618030T=0309045F=0409045T=0512060F=0601060T=0503060F=0610060T=0512060F=0601060T=0503060F=0610060T=0318050F=0400050T" data-time="006">
                                양손 원그리기
                            </a>
                            <a class="btn btn-success item motion" data-id="&32:=0518000F=0600000T=0304045F=0414045T#0500=0506000F=0607000T=0412035F=0306035T=0610070F=0503070T=0602070F=0511070T=0610070F=0503070T=0602070F=0511070T#0500=0500000F=0618000T=0415060F=0303060T#0800=0506000F=0607000T=0400050F=0306035T=0503070T=0511070T=0503070T=0511070T=0318050T" data-time="005">
                                무섭지 않음
                            </a>
                            <a class="btn btn-success item motion" data-id="&03:=0012020T#0300=0005090T" data-time="002">
                                고개숙여인사
                            </a>
                            <a class="btn btn-success item motion" data-id="&09:=0500000F=0618000F=0300090F=0418090T#0200=0506000F=0607000F=0318090F=0400090T" data-time="001">
                                양손 크게들기
                            </a>
                            <a class="btn btn-success item motion" data-id="&17:=0300070F=0418070F=0500050F=0618050F=0900060T=0510050F=0603050F=0918060T=0500050F=0618050F=0900060T=0510050F=0603050F=0918060T=0318050F=0400050F=0909050T" data-time="004">
                                난리치기
                            </a>
                            <a class="btn btn-success item motion" data-id="&06:=0518000F=0008020F=0304060T=0005020F=0506000F=0318060T" data-time="001">
                                오른손 먹기
                            </a>
                            <a class="btn btn-success item motion" data-id="&06:=0600000F=0008020F=0414060T=0005020F=0607000F=0400060T" data-time="001">
                                왼손 먹기
                            </a>
                            <a class="btn btn-success item motion" data-id="&10:=0008020F=0518000F=0304060F=0600000F=0414060T=0005020F=0607000F=0400060F=0506000F=0318060T" data-time="001">
                                양손 먹기
                            </a>
                            <a class="btn btn-success item motion" data-id="&10:=0518000F=0600000F#0300=0304045F=0414045T#0500=0506000F=0607000F=0318060F=0400060T" data-time="002">
                                양손 입앞으로
                            </a>
                            <a class="btn btn-success item motion" data-id="&09:=0518000F=0600000F#0300=0300060F=0418060T=0500050F=0618050T=0318060F=0400060T" data-time="002">
                                크게 원 그리기
                            </a>
                            <a class="btn btn-success item motion" data-id="&14:=0518000F=0600000F#0300=0300045F=0418045T=0500030F=0618030T=0318045F=0400045T=0309045F=0409045T#1000=0318040F=0400040T" data-time="005">
                                양팔벌리기
                            </a>
                            <a class="btn btn-success item motion" data-id="&13:=0411040F=0307040T=0809050T#0100=0800050T=0709050T#0100=0718050T=0809050T#0100=0800050T=0318050F=0400050T" data-time="004">
                                물건들고 걷기
                            </a>
                            <a class="btn btn-success item motion" data-id="&06:=0312040F=0518000T=0306070F=0500070T=0318050F=0506000T" data-time="001">
                                오른손 바깥으로
                            </a>
                            
                            <a class="btn btn-success item motion" data-id="&09:=0500000F=0618000T=0413060F=0305060T#1000=0400060F=0318060T=0506000F=0607000T" data-time="002">
                                어깨높이 양손들기
                            </a>
                            <a class="btn btn-success item motion" data-id="&01:=0900050T" data-time="001">
                                몸통 오른쪽으로
                            </a>
                            <a class="btn btn-success item motion" data-id="&10:=0500000F=0618000T=0413060F=0305060T=0918040T=0400040F=0318040T=0506000F=0607000F=0909050T" data-time="002">
                                양손들고 몸통 왼쪽
                            </a>
                            <a class="btn btn-success item motion" data-id="&10:=0903040F=0518000F=0007020F#0600=0915040T#0600=0005020F=0506000F=0318060T=0909050T" data-time="003">
                                오른팔들고 몸 좌 우로
                            </a>

                            <!--<a class="btn btn-success item motion" data-id="&10:=0307040F=0809050T#0100=0318040F=0800050T=0411040F=0709050T#0100=0400040F=0718050T" data-time="002">걷기</a>-->
                        </div>
                    </div>
                    
                    <!-- 여기는 효과음-->
                    <div role="tabpanel" class="tab-pane" id="effect">
                        <!--카테고리 영역-->
                        <div class="tabpanel-header">
                            
                        </div>
                        ['오른팔흔들기
                        <!--실제 효과음들 영역-->
                        <div class="itemList">
                            @foreach($BE_sound as $value)
                            <a class="btn btn-info item effect" data-id="{{$value->file_name}}" data-time="{{$value->time_of_soundfile}}">
                                {{$value->koreanName}}
                            </br>
                            <!--{{$value->time_of_soundfile}}-->
                            </a>
                            @endforeach
                            @foreach($UE_sound as $value)
                            <a class="btn btn-info item effect" data-id="{{$value->file_name}}" data-time="{{$value->time_of_soundfile}}">
                                {{$value->koreanName}}
                            </br>
                            <!--{{$value->time_of_soundfile}}-->
                            </a>
                            @endforeach
                            @foreach($UV_sound as $value)
                            <a class="btn btn-info item effect voice" data-id="{{$value->file_name}}" data-time="{{$value->time_of_soundfile}}">
                                {{$value->koreanName}}
                            </br>
                            <!--{{$value->time_of_soundfile}}-->
                            </a>
                            @endforeach
                            <a class="btn btn-info item effect" data-id="" data-time="003">어흥</a>
                            <a class="btn btn-info item effect" data-id="" data-time="004">복숭아먹는소리</a>
                        </div>
                    </div>
                    
                    <!--여기는 배경음-->
                    <div role="tabpanel" class="tab-pane" id="bgm">
                        <!--카테고리 영역-->
                        <div class="tabpanel-header">
                            
                        </div>
                        
                        <!--실제 배경음들 영역-->
                        <div class="itemList">
                            @foreach($BB_sound as $value)
                            <a class="btn btn-warning item bgm" data-id="{{$value->file_name}}" data-time="{{$value->time_of_soundfile}}">{{$value->koreanName}}
                            </br>
                            <!--{{$value->time_of_soundfile}}-->
                            </a>
                            @endforeach
                            @foreach($UB_sound as $value)
                            <a class="btn btn-warning item bgm" data-id="{{$value->file_name}}" data-time="{{$value->time_of_soundfile}}">{{$value->koreanName}}
                            </br>
                            <!--{{$value->time_of_soundfile}}-->
                            </a>
                            @endforeach
                        </div>
                    </div>
                    
                    <!--여기는 지연-->
                    <div role="tabpanel" class="tab-pane" id="delay">
                        <div class="itemList">
                            <a class="btn btn-danger item bgm delay" data-id="delay" data-time="001">지연</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--동작을 여기다가 정의-->
        <div class="col-md-8 define-col">
            <div class="panel panel-info">
                <div class="panel-heading define-areaTitle"><h3>이 곳에 동작을 정의해 주세요</h3></div>
                <div class="panel-body define-area">
                </div>
            </div>
        </div>
        
        <!--타임라인-->
        <div class="col-md-12 timeLine">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    타임라인
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#setTime">시간 설정</button>
                </div>
                <div class="panel-body">
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary total-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                            <span class="">전체[<span class="total-time">0</span><span class="">]</span></span>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success motion-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            <span class="">동작[</span><span class="motion-time">0</span><span class="">]</span>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-info effect-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                            <span class="">효과음[</span><span class="effect-time">0</span><span class="">]</span>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning bgm-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                            <span class="">배경음[</span><span class="bgm-time">0</span><span class="">]</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function(){
        var sList = null;
        var tolerance = 15;
        var time = [];
        
        $(".itemList .item").draggable({
            start:function(event, ui){
            },
            helper:"clone",
            snap:true,
            snapTolerance:tolerance
        });
        
        $(".define-area").droppable({
            // 블럭 오버
            over: function(event, ui){
                $(".define-areaTitle").removeClass("panel-info").addClass("panel-danger");
            },
            
            // 블럭 아웃
            out: function(event, ui){
                $(".define-areaTitle").removeClass("panel-danger").addClass("panel-info");
            },
            
            // 블럭 드랍
            drop:function(event, ui){
                $(".define-areaTitle").removeClass("panel-danger").addClass("panel-info");
                if(!$(ui.draggable).hasClass("defined")){
                    if($(ui.draggable).hasClass("delay")){
                        var delayTime = prompt("딜레이시킬 시간을 입력해주세요");
                        $(ui.draggable).attr("data-time",delayTime).text("지연"+"["+delayTime+"]");
                    }
                    var top  = ui.offset.top-$(".m-header").outerHeight()-$(".define-areaTitle").outerHeight()-1;
                    var left = ui.offset.left-$(".define-list").outerWidth()-1;
                    $(ui.draggable).clone().appendTo(this).addClass("defined").css({
                        top:top,
                        left:left,
                        position:"absolute",
                        height:$(ui.draggable).attr("data-time")*20,
                        "line-height":$(ui.draggalbe).attr("data-time")*20,
                    }).draggable({
                        snap:true,
                        snapTolerance:tolerance
                    }).bind("contextmenu", function(event){
                        event.preventDefault();
                        $(this).remove();
                    })
                    
                }
                /********************************/
                var list = $(this).find(".defined");
                sortBlock(list);
                sList = blockToList(list);
                console.log(sList); /***********************************************************/
                
                /********************************/
                drawTimeline();
            },
            accept:".item",
        });
        
        $("a[href='#transferData']").on('click', function(){
            if(sList == null){
                alert("동작이 정의되지 않았습니다.");
                return ;
            }
            var motionData           = dataConvert(sList, "motion");
            var effectData           = dataConvert(sList, "effect");
            var bgmData              = dataConvert(sList, "bgm");
            
            var userEffectData       = userDataConvert("effect");
            var userBgmData          = userDataConvert("bgm");
            var userEffectName       = userEffectData.dataName;
            var userEffectfileName   = userEffectData.data;
            var userBgmName          = userBgmData.dataName;
            var userBgmfileName      = userBgmData.data;
            
            var totalData            = {};
            totalData.move           = motionData;
            totalData.sound          = effectData;
            totalData.bgm            = bgmData;
            totalData.uvName         = userEffectName;
            totalData.uv             = userEffectfileName;
            totalData.ubName         = userBgmName;
            totalData.ub             = userBgmfileName;
            
            console.log(totalData);
            var jsonData = JSON.stringify(totalData);
            
            $.ajax({
                url:"/moveDataTransfer",
                method:"post",
                dataType:"json",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "data": jsonData,
                },
                success:function(){
                    console.log("success");
                 
                }
            });
            
        });
        var sortBlock = function(list){
            for(var i = 0; i<list.length; ++i){
                for(var j = i; j<list.length; ++j){
                    if($(list[i]).offset().top > $(list[j]).offset().top){
                        var temp = list[i];
                        list[i] = list[j];
                        list[j] = temp;
                    } // end if
                    else if($(list[i]).offset().top == $(list[j]).offset().top){
                        if($(list[i]).offset().left > $(list[j]).offset().left){
                            var temp = list[i];
                            list[i] = list[j];
                            list[j] = temp;
                        }// end if
                    } // end else if
                }// end for j
            }// end for i
        }
        
        var blockToList = function(list){
            var linked = new List();
            
            // 블록 오차범위
            var errorRange = 2;
            
            // TOP 갯수 결정
            var top = [$(list[0]).offset().left, ];
            linked.addLast(list[0]);
            for(var i = 1; i<list.length; ++i){
                if(list[i]){
                    if($(list[i]).offset().top == $(list[i-1]).offset().top ||
                       $(list[i]).offset().top == $(list[i-1]).offset().top+errorRange ||
                       $(list[i]).offset().top == $(list[i-1]).offset().top-errorRange){
                        linked.addLast(list[i]);
                        top[i] = $(list[i]).offset().left;
                    }
                    else break;
                }
            }
    
            // 공백처리 안됨
            for(var i = top.length; i<list.length;++i){
                for(var j = 0; j < top.length; ++j){
                    if($(list[i]).offset().left == top[j]){
                        linked.addBottom(j,list[i]);
                    }
                }
            }
            return linked;
        }
        
        var dataConvert = function(list, kind){
            if(kind == "motion") kind = 0;
            else if(kind == "effect") kind = 1;
            else if(kind == "bgm") kind = 2;
            else {
                alert("error");
                return ;
            }
            
            var limit = list.getIndex(kind,true).bottomLength;
            var sTime = 0;
            var motionString = '{';
            
            for(var i = 0 ; i <= limit ; ++i){
                var target = $(list.getBottomIndex(kind,i).data);
                motionString += '"'+i+'"' + ":";
                motionString += '"';
                if(target.hasClass("delay")) {
                    motionString += "&01:#" + (target.attr("data-time")*1000);
                }
                else if(i > 0 && (target.hasClass("effect") || target.hasClass("bgm"))){
                    sTime += parseInt(target.attr("data-time"));
                    if(sTime < 10) motionString += "00" + sTime;
                    else if(sTime >= 10 && sTime < 100) motionString += "0" + sTime; 
                    else motionString += sTime;
                }else if((target.hasClass("effect") || target.hasClass("bgm"))){
                    motionString += '000';
                }
                // else motionString += target.attr("data-time");
                if(!target.hasClass("delay")) motionString += target.attr("data-id");
                motionString += '"';
                if(i == limit) motionString += "}";
                else motionString += ",";
            }
            return JSON.parse(motionString);
        }
        
        var userDataConvert = function(kind){
            if(!(kind == "effect" || kind == "bgm")){
                alert("error");
                return ;
            }
            var soundList = $(".itemList").find(".userSound");
            var dataOBJ = {};
            var data = '{';
            var dataName = '{';
            for(var i = 0 ; i <= soundList.length ; ++i){
                var target = $(soundList[i]);
                if(target.hasClass(kind)){
                    data += '"'+i+'"';
                    data += ':';
                    data += '"';
                    data += target.attr("data-id");
                    data += '"';
                    
                    if(i == soundList.length-1) data += "}";
                    else data += ",";
                    
                    dataName += '"'+i+'"';
                    dataName += ':';
                    dataName += '"';
                    dataName += target.text();
                    dataName += '"';
                    
                    if(i == soundList.length-1) dataName += "}";
                    else dataName += ",";
                }
                
            }
            if(data == '{') data = '{}';
            if(dataName == '{') dataName = '{}';
            
            dataOBJ.data = JSON.parse(data);
            dataOBJ.dataName = JSON.parse(dataName);
            
            return dataOBJ;
        }
        
        var drawTimeline = function(){
            var totalBar = $(".total-bar");
            var motionBar = $(".motion-bar");
            var effectBar = $(".effect-bar");
            var bgmBar    = $(".bgm-bar");
            
            var totalTime = $(".total-time");
            var motionTime = $(".motion-time");
            var effectTime = $(".effect-time");
            var bgmTime = $(".bgm-time");
            var arrTime = [0,0,0];
            
            var totalPer = 0;
            var motionPer = 0;
            var effectPer = 0;
            var bgmPer = 0;
            
            // getTime
            var timeList = $(".defined");
            console.log(timeList);
            for(var i = 0 ; i < timeList.length ; ++i){
                if($(timeList[i]).hasClass("motion")){
                    arrTime[0] += parseInt($(timeList[i]).attr("data-time"));
                }else if($(timeList[i]).hasClass("effect")){
                    arrTime[1] += parseInt($(timeList[i]).attr("data-time"));
                }else if($(timeList[i]).hasClass("bgm")){
                    arrTime[2] += parseInt($(timeList[i]).attr("data-time"));
                }
            }
            
            motionPer = arrTime[0] * 20;
            effectPer = arrTime[1] * 20;
            bgmPer = arrTime[2] * 20;
            totalPer = motionPer + effectPer + bgmPer;
            totalBar.css("width", totalPer);
            motionBar.css("width",motionPer);
            effectBar.css("width",effectPer);
            bgmBar.css("width",bgmPer);
            totalTime.text(totalPer);
            motionTime.text(motionPer);
            effectTime.text(effectPer);
            bgmTime.text(bgmPer);
        }
        
        $("a[href='#exam1']").on('click', function(event){
            
        })
    });
</script>