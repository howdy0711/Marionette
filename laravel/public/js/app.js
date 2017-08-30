// Drag & Drop
$(function(){
    
    var img = [];
    var imgSrc = "https://marionette-cloned-marionette.c9users.io/img/gif/";
    var imgList = ["hello.gif","shakeHands.gif","walk.gif","handsUp.gif","shakeHand.gif","crying.gif"];
    for(var i = 0; i<imgList.length;++i){
        img[i] = new Image();
        img[i].src = imgSrc + imgList[i];
    }
    console.log(img);
    // 우클릭 방지 ㅋ
    $(document).bind("contextmenu", function(event) { 
        event.preventDefault();
    });
    
    $('body').on('click',function(){
        $('.previewImg').hide('slow');
    });
    $('.motion').on('mousedown', function(event){
        if(event.which == 3){
            var mouseX = event.pageX;
            var mouseY = event.pageY;
            var imgSrc = "https://marionette-cloned-marionette.c9users.io/img/gif/";
            console.log($(this).attr("id"));
            // 인사하기
            if($(this).attr("id") == 'motion1'){
                imgSrc += "hello.gif";
            }
            
            // 손흔들기
            if($(this).attr("id") == 'motion2'){
                imgSrc += "shakeHands.gif";
            }
            
            // 걸어가기
            if($(this).attr("id") == 'motion3'){
                imgSrc += "walk.gif";
            }
            
            // 양손들기
            if($(this).attr("id") == 'motion4'){
                imgSrc += "handsUp.gif";
            }
            
            // 오른손 혼들기(부정)
            if($(this).attr("id") == 'motion5'){
                imgSrc += "shakeHand.gif";
            }
            
            // 울기
            if($(this).attr("id") == 'motion6'){
                imgSrc += "crying.gif";
            }
            
            $('.previewImg').css({
                "position":"absolute",
                "top":mouseY,
                "left":mouseX,
            }).show("slow");
            $('.previewImg img').attr("src",imgSrc);
            
        }
        
    });
    var linked;
    var startLeft;
    var startTop;
    var startElem;

    // [다시정의] 버튼 클릭
    $("a[href='#reset']").click(function(){
        $('.defined').remove();
        drawTimeline();
    });

    $("a[href='#return']").click(function(){
        
            window.location.href ='https://marionette-cloned-marionette.c9users.io/';
    });


    // class item 속성 드래그
    $(".item").draggable({
        start: function(event, ui){
            startLeft = ui.offset.left;
            startTop = ui.offset.top;
            startElem = this;
        },
        snap:true,
        helper:"clone",
    });

    // 정의영역에 드랍됬을 시
    var originCSS = $(".define-area").css("border");
    $(".define-area").droppable({
        over: function(){
            $(this).css("border","4px solid lightgreen");
        },
        out:function(){
            $(this).css("border",originCSS);
        },
        accept:".item",
        drop: function(evnet, ui){
            $(this).css("border",originCSS);
            // class defined 없으면
            if(!$(ui.draggable).hasClass("defined")){
                var css = {
                    left:ui.offset.left,
                    top:ui.offset.top,
                    position:"absolute"};
                $(ui.draggable).clone().appendTo(this).addClass("defined").css(css).draggable({snap:true});
                
            }
            var list = $(this).find('span.defined');
            checkBlock(list);
            console.log(linked);
        }
    });


    // 블록 체크 ( 정렬 객체화 )
    var checkBlock = function(list){
        sortBlock(list);
        memberAdd(list);
        blockToList(list);
        drawTimeline(list);
    }// end function

    // 탑순으로 블록 정렬
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

    // list에 필요한 멤버들을 담고있는 Item 객체 추가
    var memberAdd = function(list){
        for(var i = 0; i<list.length;++i){
            list[i].item = new Item(list[i]);
        }
    }

    // 블록을 링크드리스트에 추가
    var blockToList = function(list){
        linked = new List();
        // TOP 갯수 결정
        var top = [$(list[0]).offset().left, ];
        linked.addLast(list[0]);
        for(var i = 1; i<list.length; ++i){
            if(list[i]){
                if($(list[i]).offset().top == $(list[i-1]).offset().top){
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

    // 타임라인 그리기
    var drawTimeline = function(list){
        var total = 0;
        var motion = 0;
        var effect = 0;
        var bgm = 0;
        
        if(!list){
            $(".bar").css("width","0");
            return 0;
        }
        for(var i = 0; i<list.length;++i){
            var item = list[i].item;
            switch(item.kind){
                case "motion":
                    motion += item.time;
                    break;
                case "effect":
                    effect += item.time;
                    break;
                case "bgm":
                    bgm += item.time;
                    break;
            }
        }
        total = motion + effect + bgm;
        $(".allTimeBar").css({
            "background-color":"#ff0ff0",
            "height":"27px",
            "border-radius":"20px",
        }).animate({"width":total});
        $(".motionBar").css({
            "background-color":"black",
            "height":"27px"
        }).animate({"width":motion});
        $(".effectBar").css({
            "background-color":"black",
            "height":"27px"
        }).animate({"width":effect});
        $(".bgmBar").css({
            "background-color":"black",
            "height":"27px"
        }).animate({"width":bgm});
        $(".allTimeCount").text(total);
        $(".motionCount").text(motion);
        $(".effectCount").text(effect);
        $(".bgmCount").text(bgm);

    }
    
    $('a[href="#done"]').click(function(){
        dataTransfer();
    });
    
    function dataTransfer(){
            
            var json = convertToJson(linked);
        
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
            
            window.location.href ='https://marionette-cloned-marionette.c9users.io/';
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
            uvList = $(".item-list").find(".uv");
            ubList = $(".item-list").find(".ub");
            
            for(var i = 0; i<uvList.length;++i){
                
                uv += '"'+i+'"';
                uv += ':';
                uv += '"' + $(uvList[i]).attr("id") + '"';
                
                uvName += '"'+i+'"';
                uvName += ':';
                uvName += '"' + $(uvList[i]).text().trim() + '"';
                if(i == uvList.length-1){
                    uv += '}';
                    uvName += '}';
                }else{
                    uv += ",";
                    uvName += ",";
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
                }else{
                    uvName += ",";
                }
            }
            if(uv == "{") uv = "{}";
            if(ub == "{") ub = "{}";
            if(uvName == "{") uvName = "{}";
            if(ubName == "{") ubName = "{}";
            console.log(uv);
            uv = JSON.parse(uv);
            ub = JSON.parse(ub);
            uvName = JSON.parse(uvName);
            ubName = JSON.parse(ubName);
            move = JSON.parse(move);
            sound = JSON.parse(sound);
            bgm = JSON.parse(bgm);
            
            var jsonData = {"move":move, "sound":sound,"bgm":bgm, "uv":uv,"ub":ub,"ubName":ubName,"uvName":uvName};
            console.log(jsonData);
            return jsonData;
        }
});
