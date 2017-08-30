

@extends('layouts.master2')
@section('lnb')
@include('marionett.SearchKeywordModal')

<li><a href="{{secure_url('/')}}">전체보기</a></li>
<li><a class='dropdown-button' href='#' data-activates='category'>카테고리별</a></li>
<li><a class='dropdown-button' href='#' data-activates='price'>가격대별 조회</a></li>
<li><a class='dropdown-button' href='#' data-activates='sell'>판매순위별 조회</a></li>
<li><a class='dropdown-button' href='#' data-activates='age'>연령대별 조회</a></li>
<li><a class='dropdown-button' href='#' data-activates='date'>등록일순 조회</a></li>
<li><a class='dropdown-button' href='#' data-activates='seller'>판매자 조회</a></li>


<li><a href="#keyword">키워드검색</a></li>

<li><a href="{{secure_url('#SearchDetail')}}" >상세검색</a></li>
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

@section('content')
@include('marionett.contentListModal')
@include('marionett.SearchKeywordModal')
@include('marionett.perPriceModal')
@include('marionett.SearchAgeModal')

    @foreach($content as $cont)
<div class="row">
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

