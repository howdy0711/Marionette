$(function(){
   if($(".button-collapse").length>0){
       $(".button-collapse").sideNav();
   }
    
    // 게시판
    if($('#comment').length>0){
        $('#comment').attr('placeholder','댓글을 작성해주세요.');
        $('#comment').trigger('autoresize');
    }
    
    // 최근 등록, 인기 게시물
    if($('.carousel').length>0){
        $('.carousel').carousel();
    }
    
    // 컨텐츠 뷰 책보기
    if($('#book').length>0){
        $('#book').turn({
            width:"100%",
            height:"600px",
            autoCenter:true,
            duration:1500,
        });
    }
    
    // 컨텐츠만들기 모달 띄우기
    if($('.modal').length>0){
        $('.modal').modal();
    }
    
    // 셀렉트박스
    if($('select').length>0){
        $('select').material_select();
    }

    if($('.slider').length>0){
        $('.slider').slider({
            "interval":3000,
            "height":500,
        });
    }
    // POST AJAX 셋업
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
});