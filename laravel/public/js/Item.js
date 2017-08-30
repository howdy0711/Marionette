var Item = (function(item){
    $item = $(item);
    
    this.motionName = $item.attr("id");
    this.name = $item.text();
    
    // 동작일 경우
    if($item.hasClass("motion")){
        this.kind = "motion";

        switch(this.motionName){
            case "motion1":
                this.time = 3;
                break;
            case "motion2":
                this.time = 2;
                break;
            case "motion3":
                this.time = 4;
                break;
            default:
                this.time = 0;
        }
    }

    // 효과음일 경우
    if($item.hasClass("effect")){
        this.kind = "effect";
        this.time = 5;
        $.ajax({
            url:"",
            data:{id:this.motionName},
            success:function(data){
                this.time = data;
            }
        });
    }

    // 배경음일 경우
    if($item.hasClass("bgm")){
        this.kind = "bgm";
        this.time = 200;
        $.ajax({
            url:"",
            data:{id:this.motionName},
            success:function(data){
                this.time = data;
            }
        });
    }

    // 딜레이일 경우
    if($item.hasClass("delay")){
        this.kind = "delay";
    }
    
});