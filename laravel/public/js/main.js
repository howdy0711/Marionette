// define
    var url = "https://marionette-cloned-marionette.c9users.io/img/gif/"
    var motionData = {
        "a":url + "물건들고걷기.gif",
        "b":url + "양팔원그리기.gif",
        "c":url + "어흥.gif",
        "d":url + "오른손먹기.gif",
        "e":url + "왼손먹기.gif",
        "f":url + "양손먹기.gif",
    }
$(document).ready( function(){
    
    /* MACRO */
    
    $("a[href='#macro']").on('click', function(){
        console.log("aslkdj");
    })
        
    /* MACRO */
    
    /*////////////////////////////////////////////*/
    $.ajax({
        url:"/loadBlocks",
        method:"post",
        dataType:"json",
        data:{
            "_token": $("meta[name='_token']").attr("content"),
            "cont_name":$("meta[name='name']").attr("content")
        },
        success:function(data){
            for(var i = 0 ; i < data.length ; ++i){
            var item = $("<span></span>");
            item.addClass(data.blockClass);
            item.attr({
                "class":data[i].blockClass, "id":data[i].blockID,"data-id":data[i].blockDataID,"data-time":data[i].blockDataTime,
            });
            
            item.css({
                "position":"absolute",
                "top":parseInt(data[i].blockTop),
                "left":data[i].blockLeft,
                "height":parseInt(data[i].blockDataTime)*40,
                "margin":0,
                
            });
            item.text(data[i].blockText);
            item.draggable({
                start:function(event, ui){
                },
                snap:true,
                snapTolerance:tolerance
            }).bind("contextmenu", function(event){
                event.preventDefault();
                $(this).remove();
            });
            
            item.appendTo(".define-area");
            if(sList != null && list.length != 0){
                sortBlock(list);
                sList = blockToList(list);
                console.log(sList);
                lastCheck();
                sortBlock(list);
                sList = blockToList(list);
                loadGif();
            }
        }
        var list = $(".define-area").find(".item");
        if(list.length == 0){
                $(".preview-gif").find("img").remove();
                sList = null;
            }else{
                
                sortBlock(list);
                sList = blockToList(list);
                console.log(sList);
                lastCheck();
                sortBlock(list);
                sList = blockToList(list);
                loadGif();
            }
        }
    });
    /*////////////////////////////////////////////*/
    // tab 구현
    $(".tab-content > div:first-child").show();
    $(".tabpanel > ul > li:first-child").addClass("active");
    $(".tabpanel > ul > li > a").on('click', function(){
        var tabTarget = $(this).parent().parent();
        var targetID = tabTarget.attr("data-id");
        var contentID = $(this).attr("href").replace("#", "");
        tabTarget.find("li").removeClass("active");
        $(this).parent().addClass("active");
        $(".tab-content[data-id='"+ targetID +"'] > div").hide();
        $(".tab-content[data-id='"+ targetID +"'] > div#"+contentID).show();
    });


        
        
        $("a[href='#play']").click(function(){
            var MotionPlayList = [];
            for(var i = 0 ; i < sList.getIndex(0,true).bottomLength+1 ; ++i){
                MotionPlayList[i] = $(sList.getBottomIndex(0,i).data).attr("id");
            }
            var img = $("<img></img>").attr({
                "src":motionData["a"],
                "id":"previewGif",
                width:"400px",
                height:"400px",
            });
            $(this).parent().append(img);
            var cnt = 0;
            setInterval(function(){
                $("#previewGif").attr("src", motionData[MotionPlayList[cnt++]]);
                if(cnt > MotionPlayList.length){
                    cnt = 0;
                }
            },1500)
            
            
        });
        
        
    var sList = null;
    var tolerance = 25;
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
                var top  = ui.offset.top-$(".header").outerHeight()-parseFloat($(".define-area").css("margin-top"))-$(".height1").outerHeight()+$(".define-area").scrollTop()-2;
                var left = ui.offset.left-$(".item-list-wrap").outerWidth()-parseFloat($(".define-area").css("margin-left"))-parseFloat($(".define-area").css("padding-left"))-4;
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
                    console.log("aslkjd");
                    
                    var list = $(".define-area").find(".defined");
                    console.log(list);
                    if(list.length == 0){
                        $(".preview-gif").find("img").remove();
                        sList = null;
                    }else{
                        sortBlock(list);
                        sList = blockToList(list);
                        console.log(sList);
                        lastCheck();
                        sortBlock(list);
                        sList = blockToList(list);
                        loadGif();
                    }
                    
                });
                
                
                
            }
            /********************************/
            var list = $(this).find(".defined");
            if(list.length == 0){
                $(".preview-gif").find("img").remove();
                sList = null;
            }else{
                sortBlock(list);
                sList = blockToList(list);
                console.log(sList);
                lastCheck();
                sortBlock(list);
                sList = blockToList(list);
                loadGif();
            }
            /***********************************************************/
            
            /********************************/
            
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
        
        var totalData1            = {};
        totalData1.move           = motionData;
        totalData1.sound          = effectData;
        totalData1.bgm            = bgmData;
        totalData1.uvName         = userEffectName;
        totalData1.uv             = userEffectfileName;
        totalData1.ubName         = userBgmName;
        totalData1.ub             = userBgmfileName;
        
        console.log(totalData1);
        var jsonData = JSON.stringify(totalData1);
        if($("meta[name='update']").attr("content") == ""){
            $.ajax({
                url:"/moveDataTransfer_update",
                method:"post",
                dataType:"json",
                data: {
                    "_token": $("meta[name='_token']").attr("content"),
                    "name":$("meta[name='name']").attr("content"),
                    "block_array":blockDataSave(),
                    "data": jsonData,
                },
                success:function(){
                    console.log("success");
                    
                }
            });
        }else{
            $.ajax({
                url:"/moveDataTransfer",
                method:"post",
                dataType:"json",
                data: {
                    "_token": $("meta[name='_token']").attr("content"),
                    "block_array":blockDataSave(),
                    "data": jsonData,
                },
                success:function(){
                    console.log("success");
                    
                }
            });
        }
        
        // alert("등록 완료");
        if($("meta[name='update']").attr("content") == ""){
            location.href = "https://marionette-cloned-marionette.c9users.io/myMarionetteStory?info=purchase";
        }else{
            location.href = "https://marionette-cloned-marionette.c9users.io/";
        }
    });
    var lastCheck = function(){
        for(var i = 0; i < sList.length+1 ; ++i){
            for(var j = 0 ; j < sList.getIndex(i,true).bottomLength+1 ; ++j){
                if(sList.getBottomIndex(i,j+1) == null){
                }else{
                    var target = $(sList.getBottomIndex(i,j).data);
                    var target2 = $(sList.getBottomIndex(i,j+1).data);
                    var top = parseInt(target.css("top"));
                    var height = parseInt(target.height());
                    var bottom = parseInt(target.css("top")) + parseInt(target.height());
                    
                    var top2 = parseInt(target2.css("top"));
                    var height2 = parseInt(target2.height());
                    var bottom2 = parseInt(target2.css("top")) + parseInt(target2.height());
                    
                    if(bottom > top2){
                        var totalHeight = bottom2-top;
                        var height1 = totalHeight - (bottom2 - top2);
                        var height2 = totalHeight - (bottom - top);
                        var need = totalHeight-height1-height2;
                        console.log(need);
                        target2.css("top", top2+need+4);
                    }
                }
                
                
            }
        }
    }
    var totalData = [];
    var blockDataSave = function(){
        totalData = [];
        var blockData = function(text, top, left, height, bClass, blockID, blockDataID, blockDataTime){
            this.blockText = text;
            this.blockTop = top;
            this.blockLeft = left;
            this.blockHeight = height;
            this.blockClass = bClass;
            this.blockID = blockID;
            this.blockDataID = blockDataID;
            this.blockDataTime = blockDataTime;
        }
        
        
        console.log(sList.length);
        console.log(sList.getIndex(0,true).bottomLength);
        var cnt = 0;
        for(var i = 0; i < sList.length+1 ; ++i){
            for(var j = 0 ; j < sList.getIndex(i,true).bottomLength+1 ; ++j){
                var target = $(sList.getBottomIndex(i,j).data);
                console.log(target.attr("data-time"));
                totalData[cnt] = new blockData(target.text(), target.css("top"), target.css("left"), target.height(), target.attr("class"), target.attr("id"), target.attr("data-id"), target.attr("data-time"));
                cnt++;
            }
        }
        return JSON.stringify(totalData);
    };
    
    
    $("a[href='#loadTest']").on("click", function(){
        for(var i = 0 ; i < totalData.length ; ++i){
            var item = $("<a></a>");
            item.addClass(totalData.blockClass);
            item.attr("class",totalData[i].blockClass);
            item.css({
                "position":"absolute",
                "top":totalData[i].blockTop,
                "left":totalData[i].blockLeft,
                "height":totalData[i].blockHeight
            })
            item.text(totalData[i].blockText);
            item.draggable({
                start:function(event, ui){
                },
                snap:true,
                snapTolerance:tolerance
            }).bind("contextmenu", function(event){
                event.preventDefault();
                $(this).remove();
            });
            
            item.appendTo(".define-area");
            console.log("aslkdjd");
        }
    });
    
    $("a[href='#motionPreview']").on("click", function(){
        loadGif();
    });
    var sortBlock = function(list){
        for(var i = 0; i<list.length; ++i){
            for(var j = i; j<list.length; ++j){
                if($(list[i]).offset().top > $(list[j]).offset().top){
                    var temp = list[i];
                    list[i] = list[j];
                    list[j] = temp;
                } // end if
                else if(parseInt($(list[i]).offset().top) == parseInt($(list[j]).offset().top)){
                    if(parseInt($(list[i]).offset().left) > parseInt($(list[j]).offset().left)){
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
                if(parseInt($(list[i]).offset().top) == parseInt($(list[i-1]).offset().top)){
                    linked.addLast(list[i]);
                    top[i] = $(list[i]).offset().left;
                }
                else break;
            }
        }

        // 공백처리 안됨
        for(var i = top.length; i<list.length;++i){
            for(var j = 0; j < top.length; ++j){
                if(parseInt($(list[i]).offset().left) == parseInt(top[j])){
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
        // var totalBar = $(".total-bar");
        var motionBar = $(".motion-bar");
        var effectBar = $(".effect-bar");
        var bgmBar    = $(".bgm-bar");
        
        // var totalTime = $(".total-time");
        var motionTime = $(".motion-time");
        var effectTime = $(".effect-time");
        var bgmTime = $(".bgm-time");
        var arrTime = [0,0,0];
        
        // var totalPer = 0;
        var motionPer = 0;
        var effectPer = 0;
        var bgmPer = 0;
        
        // getTime
        var timeList = $(".define-area").find(".item");
        for(var i = 0 ; i < timeList.length ; ++i){
            if($(timeList[i]).hasClass("motion")){
                arrTime[0] += parseInt($(timeList[i]).attr("data-time"));
            }else if($(timeList[i]).hasClass("effect")){
                arrTime[1] += parseInt($(timeList[i]).attr("data-time"));
            }else if($(timeList[i]).hasClass("bgm")){
                arrTime[2] += parseInt($(timeList[i]).attr("data-time"));
            }
        }
        var range = 10;
        console.log(arrTime);
        motionPer = arrTime[0];
        effectPer = arrTime[1];
        bgmPer = arrTime[2];
        // totalPer = motionPer + effectPer + bgmPer;
        // totalBar.css("width", totalPer);
        motionBar.css("width",motionPer*range);
        effectBar.css("width",effectPer*range);
        bgmBar.css("width",bgmPer*range);
        // totalTime.text(totalPer);
        motionTime.text(motionPer);
        effectTime.text(effectPer);
        bgmTime.text(bgmPer);
    }
    var loadGif = function(){
        var target = $(".preview-gif");
        
        target.find("img").remove();
        var MotionPlayList = [];
            for(var i = 0 ; i < sList.getIndex(0,true).bottomLength+1 ; ++i){
                var img = $("<img></img>").attr({
                    "src":motionData[$(sList.getBottomIndex(0,i).data).attr("id")],
                    "id":"previewGif",
                    width:"200px",
                    height:"200px",
                });
                img.appendTo(target);
            }
            
            
            
            var cnt = 0;
            setInterval(function(){
                $("#previewGif").attr("src", motionData[MotionPlayList[cnt++]]);
                if(cnt > MotionPlayList.length){
                    cnt = 0;
                }
            },1500)
        
    }

});
