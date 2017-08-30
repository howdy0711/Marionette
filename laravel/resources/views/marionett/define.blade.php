<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="{{URL::asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery-ui.js')}}"></script>
    <!--<script src="{{URL::asset('js/d3.min.js')}}"></script>-->
    <title>Document</title>

    <style>
        .item-list{width:317px; height:auto; border:3px solid pink;float:left;margin-right:100px}
        .defined-list{width:500px;height:500px; border:3px solid pink;}
        .button{padding:3px 5px; border:3px solid lightgreen; border-radius:10px; background-color:none; display:inline-block}
        .button:hover{background:gold}
        .define-area{height:80%;border:1px solid black;position:relative}
        #time{width:100%;}
        .trash-area{width:100px;height:100px;border:1px solid black;position:absolute;right:0;bottom:0}
    </style>
</head>
<body>
    <div class="wrap">
        <div class="container">
            <div class="page-header">
                <h1>동작정의</h1>
            </div>
            
            <!--***************************정의된 리스트 DIV***************************-->
            <div class="container item-list" >
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#move" aria-controls="move" role="tab" data-toggle="tab">동작</a></li>
                        <li role="presentation"><a href="#sound" aria-controls="sound" role="tab" data-toggle="tab">사운드</a></li>
                        <li role="presentation"><a href="#background" aria-controls="background" role="tab" data-toggle="tab">배경음악</a></li>
                        <li role="presentation"><a href="#delay" aria-controls="delay" role="tab" data-toggle="tab">지연</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content" id="itemList">
                        <!--동작-->
                        <div role="tabpanel" class="tab-pane active" id="move">
                           <span class="button" id="hello">인사하기</span>
                           <span class="button" id="hand">손흔들기</span>
                        </div>
                        <!--사운드-->
                        <div role="tabpanel" class="tab-pane" id="sound">
                            <span class="button">손흔들기</span>
                            <span class="button">손흔들기</span>
                        </div>
                        <!--배경음악-->
                        <div role="tabpanel" class="tab-pane" id="background">
                            <span class="button">손흔들기</span>
                            <span class="button">손흔들기</span>
                        </div>
                        <!--지연-->
                        <div role="tabpanel" class="tab-pane" id="delay">
                            <span class="button">지연</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--***************************정의된 리스트 DIV***************************-->
            <div class="container defined-list">
                <h1>동작정의</h1><br>
                <div class="define-area">
                
                <div class="trash-area"></div>
                </div>
            </div>
            
            <button id="success">완료</button>
            
        </div>
        <svg id="time"></svg>
        
    </div>
    
    <form method="post" action="/moveDataTransfer">
        <input type="text" name="a" value="asdfsdfs"/>
        <input type="submit" value="Submit"/>
        {{ csrf_field() }}
    </form>
    <script src="js/bootstrap.js"></script>
</body>
<script>
    var Item = function(){
        this.name = "";
        this.code = "";
    };
    var i = 0;
    
    
    var totalTime = 0;
    
    var data = [totalTime];
    var list = [];
    // d3.select('svg').selectAll('rect')
    // .data(data)
    // .enter()
    // .append('rect')
    // .attr('height', "5px")
    // .attr('width', function(d, i){
    //     return d + "px";
    // })
    // .attr('x', function(d, i){
    //     return i * 10;
    // })
    // .attr('y', 0)
    jsonList=[];
    $("#itemList div>span").draggable({
        "helper":"clone"
    });
    $(".define-area").droppable({
        drop:function(event, ui){
            if(!ui.draggable.hasClass("defined")){
                ui.draggable.clone().appendTo(this).addClass("defined").draggable({snap:true});
            }else{
                test = $(this).find("span").toArray();
                // console.log($(this).find("li").position());
                console.log(test);
                for(var i = 0; i<test.length; ++i){
                    for(var j = i; j<test.length;++j){
                        if(parseInt($(test[i]).css('top')) > parseInt($(test[j]).css('top'))){
                            var temp = test[i];
                            test[i] = test[j];
                            test[j] = temp;
                        }
                    }
                }
                
                for(var i = 0; i<test.length;++i){
                    var a = $(test[i]).attr("id");
                    list[i] = objCheck(a);
                }
                moveList = "";
                for(var i = 0; i<list.length;++i){
                    if(i == 0) moveList += '{';
                    moveList +=  '"' + i + '":"'+list[i].code + '"';
            
                    if(i != list.length-1) moveList += ', ';
            
                    if( i == list.length-1) moveList+='}';
                }
                console.log(moveList);
                console.log(list);
            }
            
        }
    });
    $('.trash-area').droppable({
        drop:function(evnet, ui){
            ui.draggable.remove();
        }
    });
    $
function objCheck(id){
    switch(id){
        case "hello":
            var item = new Item();
            item.name = "인사하기";
            item.code = "codecodecode";
            return item;
        case "hand":
            var item = new Item();
            item.name = "손흔들기";
            item.code = "hand";
            return item;
    }
}

$("#success").click(function(){
    test = JSON.stringify(list);
    test = test.slice(1, -1);
    
    console.log(test);
    
    
    $.ajax({
        url:"/moveDataTransfer",
        type:"POST",
        dataType:"JSON",
        data:{"move":moveList},
        success:function(){
            console.log("전송 완료");
        }
    })
    
});

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
</script>
s
</html>

