@extends('layouts.master2')
@section('lnb')
<li><a href="{{secure_url('/')}}">전체보기</a></li>
<li><a class='dropdown-button' href='#' data-activates='category'>카테고리별</a></li>
<li><a class='dropdown-button' href='#' data-activates='price'>가격대별 조회</a></li>
<li><a class='dropdown-button' href='#' data-activates='sell'>판매순위별 조회</a></li>
<li><a class='dropdown-button' href='#' data-activates='age'>연령대별 조회</a></li>
<li><a class='dropdown-button' href='#' data-activates='date'>등록일순 조회</a></li>
<li><a class='dropdown-button' href='#' data-activates='seller'>판매자 조회</a></li>


<li><a href="#keyword">키워드검색</a></li>

<li><a href="#SearchDetail" >상세검색</a></li>

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
    <li><a href="{{secure_url('short_moving?category=sayhello')}}">인사</a></li>
    <li><a href="{{secure_url('short_moving?category=animal')}}">동물흉내</a></li>
    <li><a href="{{secure_url('product?category=english')}}">유행댄스</a></li>
</ul>


<ul id='price' class='dropdown-content'>
    <li><a href="{{secure_url('product?price=high')}}">가격높은순</a></li>
    <li><a href="{{secure_url('product?price=low')}}">가격낮은순</a></li>
    <li><a href="#perPrice">가격대별 입력</a></li>
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
    <li><a href="#PerAge">직접입력</a></li>
</ul>


<ul id='date' class='dropdown-content'>
    <li><a href="{{secure_url('product?date=new')}}">최신순</a></li>
    <li><a href="{{secure_url('product?date=old')}}">오랜된순</a></li>
</ul>


<ul id='seller' class='dropdown-content'>
    <li><a href="{{secure_url('product?user=admin')}}">관리자</a></li>
    <li><a href="#!">판매자 검색</a></li>
</ul>



@endsection
@if($count >= 1)
<style>
    .notice{
        position:fixed;
        top:0;
        right:20;
        z-index:10000000;
    }
</style>
<div class="notice">
    <a href="#notification"><span class="badge red new">{{$count}}</span></a>
</div>
<!-- Modal Structure -->
    <div id="notification" class="modal">
        <div class="modal-content">
            <h4>새로운 알림</h4>
            @foreach($noticeMessage as $value)
            <a href="/productDetail?name={{$value->cont_name}}" class="">
            상품이름 : {{$value->cont_name}}<br>
            @endforeach
            </a>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">확인</a>
        </div>
    </div>
@endif
@section('content')
@include('marionett.contentListModal')
@include('marionett.SearchKeywordModal')
@include('marionett.perPriceModal')
@include('marionett.SearchAgeModal')
@include('marionett.SearchDetail')




<style type="text/css">
    .contentHeader{
        margin-top:-20px;
    }

</style>

<style type="text/css">
     .content img{
        opacity:0.75;
    }
</style>
<div class="row">
    <div class="col s12 m12 contentHeader">
        <div class="slider">
            <ul class="slides">
              <li>
                <img src="http://cfile8.uf.tistory.com/image/21708939563F728C1570BC"> <!-- random image -->
                <div class="caption center-align">
                  <h3>당신의 꿈을 여기에 펼쳐 보세요</h3>우리들의 마리오네트이야기
                  <h5 class="light grey-text text-lighten-3"></h5>
                </div>
              </li>
              <li>
                <img src="{{secure_asset('img/banner3.png')}}"> <!-- random image -->
                <div class="caption left-align">
                  <h3>모두가 함께 즐기는 인형극</h3>
                  <h5 class="light grey-text text-lighten-3">with family</h5>
                </div>
              </li>
              <li>
                <img src="http://melissagratias.com/wp-content/uploads/2013/09/drag-and-drop.png"> <!-- random image -->
                <div class="caption right-align">
                  <h3>자신만의 인형극을 만들어 보세요!</h3>
                  <h5 class="light grey-text text-lighten-3">Drag & Drop</h5>
                </div>
              </li>
              <li>
                <img src="http://images.huffingtonpost.com/2016-05-27-1464347371-2400764-tshirtstoreecommerce.jpg"> <!-- random image -->
                <div class="caption center-align">
                  <h3>자유롭게 인형극을 공유 하세요</h3>
                  <h5 class="light grey-text text-lighten-3">사고팔고</h5>
                </div>
              </li>
            </ul>
          </div>
    </div>

    @foreach($content as $cont)
    <div class="col s2 m2 content">
        <div class="contentImg">
            <img src="{{$cont->cont_image}}" />
        </div>
        
        <div class="contentTitle center">
        <a href="/productDetail?name={{$cont->cont_name}}" class="">
                <div class="contentHeader">
                    <p class="">{{$cont->cont_name}}</p>
                </div>
                <div class="contentExplain">
                    <p class="">{{$cont->cont_category}}</p>
                </div>
            </a>
        </div>
    </div>
    @endforeach
</div>


@endsection
