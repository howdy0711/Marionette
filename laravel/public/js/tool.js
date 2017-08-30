var url = "https://marionette-cloned-marionette.c9users.io/img/gif/"
    var motionData = {
        "a":url + "물건들고걷기.gif",
        "b":url + "양팔원그리기.gif",
        "c":url + "어흥.gif",
        "d":url + "오른손먹기.gif",
        "e":url + "왼손먹기.gif",
        "f":url + "양손먹기.gif",
    }
$(function(){
    $("#contextmenu").hide();
    // BOOK
    // $("#books").turn();
    
    // TOOL ON
    $("a[href='#tools']").on('click', function(){
        $(".tools").show("fast");
    });
    
    // TOOL OFF
    $("a[href='#closeTools']").on('click', function(){
        $(".tools").hide("fast");
    });
    $(document).on('keyup', function(event){
        if(event.keyCode == 27){
            $(".tools").hide("fast");
        }
    });
    
    // TOOL DRAGGABLE
    $(".tools").draggable();
    
    // MOUSE RIGHT CLICK
    
    $(".item").bind("contextmenu", function(event) { 
        event.preventDefault();
        if(event.which == 3){
            $("#contextmenu").css({
                position : "absolute",
                top : event.clientY,
                left : event.clientX,
            });
            
            // 효과음
            if($(this).hasClass("effect")){
                $(".contextmenu-body").html("");
                var audio = $("<audio controls='true'></audio>");
                var user = $("meta[name='userData']").attr("content");
                console.log(user);
                audio.attr("src","https://marionette-cloned-marionette.c9users.io/user/"+user+"/effectFile/"+$(this).attr("data-id"));
                audio.appendTo($(".contextmenu-body"));
            }
            
            // 배경음
            if($(this).hasClass("bgm")){
                $(".contextmenu-body").html("");
                var audio = $("<audio controls='true'></audio>");
                var user = $("meta[name='userData']").attr("content");
                console.log(user);
                audio.attr("src","https://marionette-cloned-marionette.c9users.io/user/"+user+"/backSound/"+$(this).attr("data-id"));
                audio.appendTo($(".contextmenu-body"));
            }
            
            // 녹음파일
            if($(this).hasClass("voice")){
                $(".contextmenu-body").html("");
                var audio = $("<audio controls='true'></audio>");
                var user = $("meta[name='userData']").attr("content");
                console.log(user);
                audio.attr("src","https://marionette-cloned-marionette.c9users.io/user/"+user+"/voiceRecode/"+$(this).attr("data-id"));
                audio.appendTo($(".contextmenu-body"));
            }
            
            // 동작파일
            if($(this).hasClass("motion")){
                $(".contextmenu-body").html("");
                var img = $("<img></img>").attr({
                    "src":motionData[$(this).attr("id")],
                    "id":"previewGif",
                    width:"200px",
                    height:"200px",
                });
                img.appendTo($(".contextmenu-body"));
            }
            
            
            $("#contextmenu").show("fast");
            $(".motionName").text($(this).text());
            // $(".motionTime").text("동작시간 " + $(this).attr("data-time") + " 초");
        }
        $(document).click(function(){$("#contextmenu").hide("fast")});
    });
    
    
    // 파일업로드 배경음악
    $("#bgmFileBtn").click(function(){
        var blockName = prompt("소리 이름을 입력해주세요.");
        var formData = new FormData();
        
        formData.append('file', $('#bgmFile')[0].files[0]);
        formData.append('name', blockName);
        var date = new Date();
        
        var fileName = "UB_"+date.getMilliseconds() + ".wav";
        formData.append("fileName",fileName)
        console.log($('#bgmFile')[0].files[0]);
        
        $.ajax({
            url:'/UploadBackSound',
            dataType : 'json',
            processData: false,
            contentType: false,
            data:formData,
            type:'post',
            complete:function(data){
                console.log();
                $("<span></span>")
                .addClass("item bgm userSound")
                .attr("data-id",fileName)
                .attr("data-time",data.responseText)
                .text(blockName)
                .appendTo("#bgm")
                .draggable({helper:"clone"})
                .bind("contextmenu", function(event) { 
                    event.preventDefault();
                    if(event.which == 3){
                        if($(this).hasClass("bgm")){
                            $(".contextmenu-body").html("");
                            var audio = $("<audio controls='true'></audio>");
                            var user = $("meta[name='userData']").attr("content");
                            console.log(user);
                            audio.attr("src","https://marionette-cloned-marionette.c9users.io/user/"+user+"/backSound/"+$(this).attr("data-id"));
                            audio.appendTo($(".contextmenu-body"));
                        }
                    }
                });;
            }
        });
    });
                
    // 파일업로드 효과음
    $("#effectFileBtn").click(function(){
        var blockName = prompt("소리 이름을 입력해주세요.");
        var formData = new FormData();
        
        var date = new Date();
        var fileName = "UE_"+date.getMilliseconds() + ".wav";
        formData.append("fileName",fileName)
    
        formData.append('file', $('#effectFile')[0].files[0]);
        formData.append('name', blockName);
            
        $.ajax({
            url:'/UploadEffect',
            dataType : 'json',
            processData: false,
            contentType: false,
            data:formData,
            type:'post',
            complete:function(data){
                $("<a></a>").addClass("item effect userSound")
                .attr("data-id",fileName)
                .attr("data-time",data.responseText)
                .text(blockName)
                .appendTo("#effect")
                .draggable({helper:"clone"})
                .bind("contextmenu", function(event) { 
                    event.preventDefault();
                    if(event.which == 3){
                        if($(this).hasClass("voice")){
                            $(".contextmenu-body").html("");
                            var audio = $("<audio controls='true'></audio>");
                            var user = $("meta[name='userData']").attr("content");
                            console.log(user);
                            audio.attr("src","https://marionette-cloned-marionette.c9users.io/user/"+user+"/voiceRecode/"+$(this).attr("data-id"));
                            audio.appendTo($(".contextmenu-body"));
                        }
                    }
                });
            }
        });
    });

    $("#bookPreview").turn({
        width:"500px",
        height:"300px",
    });
    
});
