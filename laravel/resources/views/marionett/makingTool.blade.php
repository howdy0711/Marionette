<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/List.js"></script>
<style>
    *{margin:0px;}
    html, body{width:100%;height:100%; overflow: hidden}
    .gnb{width:100%;height:60px; background-color:darkorange; margin:0px;}
    .wrap{width:100%; height:100%;}
    .item-list{width:25%;height:70%; background-color:pink;}
    .define-area{border:1px solid black;  width:50%;height:70%;background-color:cornflowerblue;}
    .define-explain{width:25%; background-color: lightsteelblue;height:70%;margin:0px;right:0px;}
    .timeline{width:100%; height:23.7%; background-color:bisque;margin:0px;bottom:0px;}
    .item{border:1px solid lightgoldenrodyellow; border-radius:5px; padding:5px;margin:auto;display:inline-block;width:150px;margin-top:5px; text-align: center;background-color:chartreuse;}
    input[type=number]{width:50px;height:20px;}

    .text-big{font-size:25px; font-weight:bolder}
    .timeline-total{width:100%; height:10%; background-color:brown;}
    .timeline-item{width:100%; height:20%; background-color:blue;margin-top:5px;}
    #move{}
    #sound{}
    #bgm{}

</style>
</head>
<body>
    <div class="gnb navbar navbar-default">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><h3>마리오네트 동작정의</h3></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#define">정의완료</a></li>
                <li><a href="#">돌아가기</a></li>
            </ul>
        </div>
    </div>
    

    <div class="wrap">
        <div class="item-list pull-left">
                <h3 class="text-center">정의 리스트</h3>
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-title" role="tablist">
                        <li class="active"><a href="#move" aria-controls="move" role="tab" data-toggle="tab">동작</a></li>
                        <li><a href="#sound" aria-controls="sound" role="tab" data-toggle="tab">소리</a></li>
                        <li><a href="#background" aria-controls="background" role="tab" data-toggle="tab">배경음악</a></li>
                        <li><a href="#delay" aria-controls="delay" role="tab" data-toggle="tab">지연</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content" id="itemList">
                        <!--동작-->
                        <div role="tabpanel" class="tab-pane active" id="move">
                            <span class="item move" id="hello">인사하기</span>
                            <span class="item move" id="hands">손흔들기</span>
                            <span class="item move" id="eatPeach">복숭아먹기</span>
                        </div>
                        <!--사운드-->
                        <div role="tabpanel" class="tab-pane" id="sound">
                            <!--<span class="item sound" id="BB_sound1">소리1</span>-->
                            @foreach($BE_sound as $value)
                            <span class="item bgm" id="{{$value->file_name}}">{{$value->koreanName}}
                            </br>
                            {{$value->time_of_soundfile}}
                            </span>
                            @endforeach
                            @foreach($UE_sound as $value)
                            <span class="item sound" id="{{$value->file_name}}">{{$value->koreanName}}
                            </br>
                            {{$value->time_of_soundfile}}
                            </span>
                            @endforeach
                            @foreach($UV_sound as $value)
                            <span class="item sound" id="{{$value->file_name}}">{{$value->koreanName}}
                            </br>
                            {{$value->time_of_soundfile}}
                            </span>
                            @endforeach
                        </div>
                        <!--배경음악-->
                        <div role="tabpanel" class="tab-pane" id="background">
                            <!--<span class="item bgm" id="eatSound">재미있는 음악</span>-->
                            
                            @foreach($BB_sound as $value)
                            <span class="item bgm" id="{{$value->file_name}}">{{$value->koreanName}}
                            </br>
                            {{$value->time_of_soundfile}}
                            </span>
                            @endforeach
                            @foreach($UB_sound as $value)
                            <span class="item bgm" id="{{$value->file_name}}">{{$value->koreanName}}
                            </br>
                            {{$value->time_of_soundfile}}
                            </span>
                            @endforeach
                            
                        </div>
                        <!--지연-->
                        <div role="tabpanel" class="tab-pane" id="delay">
                            <span class="item delay" id="delay">
                                <input type="number" id="delay" value="">초
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="define-area pull-left">
                <h1>동작 정의</h2>
            </div>
            <div class="define-explain pull-left">
                <div class="">
                <h3 class="text-center">정의 리스트</h3>
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-title" role="tablist">
                        <li class="active"><a href="#explain" aria-controls="explain" role="tab" data-toggle="tab">동작설명</a></li>
                        <li><a href="#record" aria-controls="record" role="tab" data-toggle="tab">음성녹음</a></li>
                        <li><a href="#upload" aria-controls="record" role="tab" data-toggle="tab">소리파일</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content" id="itemList">
                        <!--동작-->
                        <div role="tabpanel" class="tab-pane active" id="explain">
                            explain
                        </div>
                        <div role="tabpanel" class="tab-pane" id="upload">
                                <h4>배경음</h4>
                                <input type="file" name="" id="bgmFile"/>    
                                <button id="bgmFileBtn">배경음업로드</button>
                                

                                <h4>효과음</h4>
                                <input type="file" name="" id="soundFile"/>
                                <button id="effectFileBtn">효과음업로드</button>

                        </div>
                        <!--사운드-->
                        <div role="tabpanel" class="tab-pane" id="record">

                        <section class="main-controls">
                          <canvas class="visualizer"></canvas> 
                          <button class="record">Record</button>
                          <button class="stop">Stop</button>
                        </section>
                    
                    <section class="sound-clips">
                    
                    </section>
                    
                    <script src="https://marionette-marionette.c9users.io/js/jquery-3.1.1.min.js"></script>
                    <script src="https://marionette-marionette.c9users.io/js/jquery-ui.js"></script>
                    <script src="https://marionette-marionette.c9users.io/js/recodingView.js"></script>
                        </div>
                        
                    </div>
                </div>
            </div>
            </div>
            <!--<div class="timeline">-->
            <!--    <span class="text-primary text-big">타임라인</span>-->
            <!--    <div class="timeline-total">-->
                    
            <!--    </div>-->
            <!--    <div class="timeline-item">-->

            <!--    </div>-->
            <!--    <div class="timeline-item">-->
                    
            <!--    </div>-->
            <!--    <div class="timeline-item">-->
                    
            <!--    </div>-->
            <!--</div>-->
            <p id="ㅁㄴㅇㅁㄴㅇㅁㄴㅇㅁㄴㅇ"></p>
</body>
<script src="js/bootstrap.js"></script>
<script>
    
    console.log($("#ㅁㄴㅇㅁㄴㅇㅁㄴㅇㅁㄴㅇ"));
    // 드래그 앤 드랍 복사할 때 전역 변수 설정
    const ITEM_WIDTH = $('.item').width();
    const ITEM_HEIGHT = $('.item').height();
    console.log(ITEM_HEIGHT);
    console.log(ITEM_WIDTH);
    /* 요소들이 들어갈 객체 */
    var Item = (function(ui){
        this.originObj  = ui;
        this.top        = $(ui).position().top;
        this.right      = $(ui).position().left + $(ui).width();
        this.bottom     = $(ui).position().top + $(ui).height();
        this.left       = $(ui).position().left;
        this.width      = $(ui).width();
        this.height     = $(ui).height();
        this.id         = $(ui).attr("id");
        this.name       = $(ui).text();
        this.code       = "";
    });

    $(function(){
        // 각 동작에 Drag & Drop
        $(".item").draggable({
            grid:[10, 10],snap:true,
            drag:function(event, ui){
            },
            helper:"clone",
        });
        
        // 동작 정의 영역에 드랍시
        $(".define-area").droppable({
            // 오버 이벤트 발생
            over:function(event, ui){
                $(this).css("border","5px solid lightgreen");
            },
            // 아웃 이벤트 발생
            out:function(event, ui){
                $(this).css("border","");
            },
            // 드랍 이벤트 발생
            drop:function(event, ui){
                console.log(event);
                $(this).css("border","");
                if(!ui.draggable.hasClass("defined")){
                    ui.draggable.clone().addClass("defined").appendTo(this).draggable({grid:[10, 10],snap:true,}).css("position","absolute").css(ui.offset);
                }
                var list = $(this).find("span");
                for(var i = 0; i<list.length; ++i){
                    list[i] = new Item(list[i]);
                }
                for(var i = 0; i<list.length; ++i){
                    makeCode(list[i]);
                }
                newList = ReConstruction(list);
                console.log(newList);
                
            },
        });

        $("a[href='#define']").click(dataTransfer);
        
        // ID값으로 동작 코드 만들기
        function makeCode(item){
            switch(item.id){
                case "hello":
                    item.code = "helloCode";
                    break;
                case "eatSound":
                    item.code = "aDFLEIFJ";
                    break;
                case "asdlkfjklj":
                    item.code = "bDSLKJFL";
                    break;
                
            }
            if(item.data==null){
                item.code = "blank";
            }
        }
        
        function ReConstruction(arr){
            list = new List();
            list.addLast(arr[0]);
            var top = [arr[0].left,];
            var cnt = 0;
            for(var i = 1; i<arr.length;++i){
                if(arr[i]){
                    if(arr[i].top == arr[i-1].top){
                        list.addLast(arr[i]);
                        top[i] = arr[i].left;
                        ++cnt;
                        continue;
                    }else{
                        break;
                    }
                }           
            }
            /* 블록 추가 알고리즘 */
            if(arr.length>top.length){
                var i = top.length;
                var j = 0;
                var controller = 0;
                while(i < arr.length){
                    if(controller >=100){
                        alert("도형을 올바르게 정렬해주세요.");
                        break;
                    }
                    if(arr[i].left == top[j]){
                        list.addBottom(j,arr[i]);
                        i++;++j;
                        if(i >= arr.length) break;
                    }else{
                        list.addBottom(j,"blank");
                        ++j;
                        controller++;
                        
                    }
                    if(j == top.length) j = 0;
                }
            }
            return list;
        }
        function convertToCode(item){
            var id = $(item).attr("id");

            switch(id){
                case "hello":
                    return "code Hello";
                case "hands":
                    return "code Hands";
                case "eatPeach":
                    return "code EatPeach";
                    
            }
        }
        function sortBlock(list){
            for(var i = 0; i<list.length; ++i){
                    for(var j = 0; j<list.length;++j){
                        if(list[i].top < list[j].top){
                            var temp = list[i];
                            list[i] = list[j];
                            list[j] = temp;
                        }
                    }
                }
            for(var i = 0; i<list.length; ++i){
                for(var j = 0; j<list.length;++j){
                    if(list[i].top == list[j].top){
                        if(list[i].left < list[j].left){
                            var temp = list[i];
                            list[i] = list[j];
                            list[j] = temp;
                        }
                    }
                }
            }
            return list;
        }
        function dataTransfer(){
            
            console.log("ok");
            var json = convertToJson(newList);
            console.log(json);
        
            json = JSON.stringify(json);
            
            $.ajax({
                url:"/moveDataTransfer",
                method:"post",
                dataType:"json",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "data": json,
                },
                success:function(){
                    console.log("success");
                }
            });
            
        }
        function convertToJson(list){
            /**************************************************************/
            var sound = "{";
            var move = "{";
            var bgm = "{";
            var mFlag            = true;
            var sFlag            = true;
            var bFlag            = true;
            if(list.getIndex(0,true)) var currentMove = list.getIndex(0,true);
            else {
                mFlag = false;
                move = "{}";
            }
            if(list.getIndex(1,true)) var currentSound = list.getIndex(1,true);
            else {
                sFlag = false;
                sound="{}";
            }
            if(list.getIndex(2,true)) var currentBgm = list.getIndex(2,true);
            else {
                bFlag = false;
                bgm = "{}";
            }

            var mCnt=0;
            var sCnt=0;
            var bCnt=0;
            while((mFlag || sFlag) || bFlag){
                if((mFlag)){
                    move += '"'+mCnt+'"';
                    move += ':';
                    move += '"' + currentMove.data.id + '"';
                    if(currentMove.bottom){
                        currentMove = currentMove.bottom;
                        mCnt++;
                        move += ', ';
                    }else{
                        mFlag = false;
                        move += '}';
                    }
                }
                if(sFlag){
                    sound += '"'+sCnt+'"';
                    sound += ':';
                    sound += '"'+currentSound.data.id+'"';
                    if(currentSound.bottom){
                        currentSound = currentSound.bottom;
                        sCnt++;
                        sound += ', ';
                    }else{
                        sFlag = false;
                        sound += '}';
                    }
                }
                if(bFlag){
                    console.log(currentBgm);
                    bgm += '"'+bCnt+'"';
                    bgm += ':';
                    bgm += '"'+currentBgm.data.id+'"';
                    if(currentBgm.bottom){
                        currentBgm = currentBgm.bottom;
                        bCnt++;
                        bgm += ', ';
                    }else{
                        bFlag = false;
                        bgm += '}';
                    }
                }
            }
            /**************************************************************/
            
            uv = "{";
            ub = "{";
            uvName = "{";
            ubName = "{";
            uvList = $("#itemList").find(".uv");
            ubList = $("#itemList").find(".ub");
            
            for(var i = 0; i<uvList.length;++i){
                
                uv += '"'+i+'"';
                uv += ':';
                uv += '"' + $(uvList[i]).attr("id") + '"';
                
                uvName += '"'+i+'"';
                uvName += ':';
                uvName += '"' + $(uvList[i]).text() + '"';
                if(i == uvList.length-1){
                    uv += '}';
                    uvName += '}';
                }
            }
            for(var i = 0; i<ubList.length;++i){
                ub += '"'+i+'"';
                ub += ':';
                ub += '"' + $(ubList[i]).attr("id") + '"';
                
                ubName += '"'+i+'"';
                ubName += ':';
                ubName += '"' + $(ubList[i]).text() + '"';
                if(i == ubList.length-1){
                    ub += '}';
                    ubName += '}';
                }
            }
            if(uv == "{") uv = "{}";
            if(ub == "{") ub = "{}";
            if(uvName == "{") uvName = "{}";
            if(ubName == "{") ubName = "{}";
            console.log (uv);
            console.log(ub);
            uv = JSON.parse(uv);
            ub = JSON.parse(ub);
            uvName = JSON.parse(uvName);
            ubName = JSON.parse(ubName);
            move = JSON.parse(move);
            sound = JSON.parse(sound);
            bgm = JSON.parse(bgm);
            
            var jsonData = {"move":move, "sound":sound,"bgm":bgm, "uv":uv,"ub":ub,"ubName":ubName,"uvName":uvName};
            return jsonData;
        }
        

        
    
        $("#bgmFileBtn").click(function(){
        var blockName = prompt("소리 이름을 입력해주세요.");
        var formData = new FormData();
        
        formData.append('file', $('#bgmFile')[0].files[0]);
        formData.append('name', blockName);
        var date = new Date();
        // $('#bgmFile')[0].files[0].name = "UB_"+date.getFullYear()+date.getMonth()+date.getDay()+date.getHours()+date.getMilliseconds();
        var fileName = "UB_"+date.getMilliseconds()+$('#bgmFile')[0].files[0].name;
        formData.append("fileName",fileName)
        console.log($('#bgmFile')[0].files[0]);

            $.ajax({
                url:'/UploadBackSound',
                dataType : 'json',
                processData: false,
                contentType: false,
                data:formData,
                type:'post',
                complete:function(){
                    console.log("aslkdjaslkdjalskdj");
                    $("<span></span>")
                    .addClass("item soundItem ub")
                    .attr("id",fileName)
                    .text(blockName)
                    .appendTo("#background")
                    .draggable({helper:"clone"});
                }
            });
        });
        
        // $("<span></span>")
        //  .addClass("item soundItem")
        //  .attr("id",fileName).text(soundName)
        //  .appendTo("#sound")
        //  .draggable({helper:"clone",grid:[15,15]});

        
        
        $("#effectFileBtn").click(function(){
            var blockName = prompt("소리 이름을 입력해주세요.");
            var formData = new FormData();
            
            var date = new Date();
            var fileName = "UE_"+date.getMilliseconds()+$('#soundFile')[0].files[0].name;
            formData.append("fileName",fileName)

            
            formData.append('file', $('#soundFile')[0].files[0]);
            formData.append('name', blockName);
            console.log(formData.get('file'));
                
                $.ajax({
                    url:'/UploadEffect',
                    dataType : 'json',
                    processData: false,
                    contentType: false,
                    data:formData,
                    type:'post',
                    complete:function(){
                        $("<span></span>").addClass("item soundItem uv")
                        .attr("id",fileName)
                        .text(blockName)
                        .appendTo("#sound")
                        .draggable({helper:"clone",grid:[15,15]});
                    }
            })
        });
        
// /UploadBackSound
// /UploadEffect
        
    });
</script>
</html>