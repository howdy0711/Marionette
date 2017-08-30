@extends('layouts.master2')

@section('assets')
<script src="{{secure_asset('js/turn.js')}}"></script>
@endsection

@section('lnb')
<li><a href="{{secure_url('/')}}">전체보기</a></li>
<li><a class='dropdown-button' href='#' data-activates='category'>카테고리별</a></li>
<li><a class='dropdown-button' href='#' data-activates='price'>가격대별 조회</a></li>
<li><a class='dropdown-button' href='#' data-activates='sell'>판매순위별 조회</a></li>
<li><a class='dropdown-button' href='#' data-activates='age'>연령대별 조회</a></li>
<li><a class='dropdown-button' href='#' data-activates='date'>등록일순 조회</a></li>
<li><a href="{{secure_url('#keyword')}}">키워드검색</a></li>
<li><a class='dropdown-button' href='#' data-activates='seller'>판매자 조회</a></li>

<li><a href="{{secure_url('#SearchDetail')}}">상세검색</a></li>
<li><a class='dropdown-button' href='#' data-activates='shortMoving'>개별동작</a></li>

<!-- Dropdown Trigger -->


<!-- Dropdown Structure -->
<ul id='category' class='dropdown-content'>
    <li><a href="{{secure_url('product?category=childrenSong')}}">동요</a></li>
    <li><a href="{{secure_url('product?category=fairytale')}}">동화</a></li>
    <li><a href="{{secure_url('product?category=english')}}">영어</a></li>
    <li><a href="{{secure_url('product?category=dance')}}">댄스</a></li>
    <li><a href="{{secure_url('product?category=education')}}">교육</a></li>
</ul>

<ul id='shortMoving' class='dropdown-content'>
    <li><a href="{{secure_url('short_moving?category=animal')}}">동물흉내</a></li>
    <li><a href="{{secure_url('short_moving?category=dance')}}">유행댄스</a></li>
    <li><a href="{{secure_url('short_moving?category=sayhello')}}">기타/유저등록</a></li>
</ul>

<ul id='price' class='dropdown-content'>
    <li><a href="{{secure_url('product?price=high')}}">가격높은순</a></li>
    <li><a href="{{secure_url('product?price=low')}}">가격낮은순</a></li>
    <li><a href="#!">가격대별 입력</a></li>
</ul>


<ul id='sell' class='dropdown-content'>
    <li><a href="{{secure_url('product?sell=now')}}">현재 판매순위</a></li>
    <li><a href="{{secure_url('product?sell=forYear')}}">년간 판매순위</a></li>
    <li><a href="{{secure_url('product?sell=forMonth')}}">월간 판매순위</a></li>
    <li><a href="{{secure_url('product?sell=forWeek')}}">주간 판매순위</a></li>
</ul>


<ul id='age' class='dropdown-content'>
    <li><a href="{{secure_url('product?age=a0_2')}}">0~2세</a></li>
    <li><a href="{{secure_url('product?age=a3_5')}}">3~5세</a></li>
    <li><a href="{{secure_url('product?age=a6_8')}}">6~8세</a></li>
    <li><a href="{{secure_url('product?age=all')}}">연령무관</a></li>
    <li><a href="#!">직접입력</a></li>
</ul>


<ul id='date' class='dropdown-content'>
    <li><a href="{{secure_url('product?date=new')}}">최신순</a></li>
    <li><a href="{{secure_url('product?date=old')}}">오랜된순</a></li>
</ul>


<ul id='seller' class='dropdown-content'>
    <li><a href="#!">관리자</a></li>
    <li><a href="#!">판매자 검색</a></li>
</ul>

@endsection

<style type="text/css">
    #book div img{
        width:100%;
        height:100%;
        margin:0;
        padding:0;
    }
</style>

@section('content')
<div class="row container">
    <div class="col s12 contentTitle">
        <h4 class="center">{{$content->cont_name}}</h4>
        <hr>
    </div>
    <div class="col s12 contentMain">
        
        <div class="" id="book">
            <div class="hard"><img src="{{secure_asset('img/tiger/title.jpg')}}"></img></div>
                    <div class=""><img src="{{secure_asset('img/tiger/last_fox.png')}}"></img></div>
                    <div class=""><img src="{{secure_asset('img/tiger/last_page1.png')}}"></img></div>
                    <div class=""><img src="{{secure_asset('img/tiger/last_tiger.png')}}"></img></div>
                    <div class=""><img src="{{secure_asset('img/tiger/last_page2.png')}}"></img></div>

  
				
				<!--<div>-->
				<!--    <video width="100%" height="100%" controls="controls">-->
		  <!--          <source src="{{$content->cont_video}}" type="video/mp4" />-->
		  <!--          </video>-->
				<!--</div>-->
</div>        
    </div>
    <div class="col s12 contentMenu">
        <hr>
        @if(Session::has('user_id'))
	    <form name = "purchaseForm" action = "/purchase?name={{$content->cont_name}}" method="post">
		  <!-- Modal Trigger -->
		  <a class="waves-effect waves-light btn left" href="#purchase">구매하기</a>
		
		  <!-- Modal Structure -->
		  <div id="purchase" class="modal">
		    <div class="modal-content">
		      <h4>구매확인창</h4>
		      <p>정말로 구매하시겠습니까?</p>
		    </div>
		    <div class="modal-footer">
		      <a href="#cancel" class="modal-action modal-close waves-effect waves-green btn-flat">아니오!</a>
		      <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">네!</button>
		    </div>
		  </div>
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
       @endif
        <a href="{{secure_url('/')}}" class="btn right">목록으로</a>
        <!--<a href="{{secure_url('/content/contentList')}}" class="btn right">글 수정</a>-->
    </div>
</div>
@endsection