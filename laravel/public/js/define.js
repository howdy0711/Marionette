$(document).ready(function(){
    var sList = null;
    var tolerance = 15;
    var time = [];
    var blockHeight = 40;
    $(".item-list .item").draggable({
        start:function(event, ui){
        },
        helper:"clone",
        snap:true,
        snapTolerance:tolerance
    });
    $(".define-area").droppable({
        // 블럭 오버
        over: function(event, ui){
        },
        
        // 블럭 아웃
        out: function(event, ui){
        },
        
        // 블럭 드랍
        drop:function(event, ui){
            if(!$(ui.draggable).hasClass("defined")){
                if($(ui.draggable).hasClass("delay")){
                    var delayTime = prompt("딜레이시킬 시간을 입력해주세요");
                    $(ui.draggable).attr("data-time",delayTime).text("지연"+"["+delayTime+"]");
                }
                var top  = ui.offset.top-$(".height-top").outerHeight()+$(".define-area").scrollTop();
                var left = ui.offset.left-$(".item-list").outerWidth();
                $(ui.draggable).clone().appendTo(this).addClass("defined").css({
                    top:top,
                    left:left,
                    position:"absolute",
                    height:$(ui.draggable).attr("data-time")*blockHeight,
                    "line-height":$(ui.draggalbe).attr("data-time")*blockHeight,
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
        var errorRange = 1;
        
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
        
        motionPer = arrTime[0];
        effectPer = arrTime[1];
        bgmPer = arrTime[2];
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
        $(".define-area a").remove();
        var motionList = ['오른팔 흔들기','어깨높이 양손들기','무섭지 않음','우는 자세','뽑기','양손 원그리기','물건들고 걷기','양손 원그리기','어깨높이 양손들기','오른손 먹기','왼손 먹기','양손 먹기','양손 입앞으로','난리치기','양손 원그리기','양손 입앞으로','오른쪽 바깥으로','뽑기','무섭지 않음','오른팔 흔들기','양손 원그리기','양손 크게들기','양손 크게들기','양손 원그리기','고개숙여인사'];
        var cnt = 0;
        var itemList = $(".item-list a")
        var height = $(itemList[0]).height();
        for(var i = 0 ; i < motionList.length; ++i){
            for(var j = 0 ; j < itemList.length ; ++j){
                if($(itemList[j]).text() == motionList[i]){
                    cnt++;
                    $("<a></a>").addClass("btn item motion defined").attr({
                        "data-id" : $(itemList[i]).attr("data-id"),
                        "data-time" : $(itemList[i]).attr("data-time"),
                    }).text(motionList[i]).appendTo(".define-area").
                    css({
                        "position":"absolute",
                        "top":30 + (height * cnt),
                        "left":100
                    }).
                    draggable({
                        snap:true,
                        snapTolerance:tolerance
                    }).bind("contextmenu", function(event){
                        event.preventDefault();
                        $(this).remove();
                    });
                }
            }
        }
        
        // while(cnt < motionList.length){
        //     for(var i = 0 ; i < itemList ; ++i){
        //         if($(itemList[i]).text() == motionList[cnt]){
        //             $("<a></a>").addClass("btn item motion defined").attr({
        //                 "data-id" : $(itemList[i]).attr("data-id"),
        //                 "data-time" : $(itemList[i]).attr("data-time"),
        //             }).appendTo(".define-area");
        //             cnt++;
        //         }
        //     }
        // }
    })
});
