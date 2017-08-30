@extends('layouts.master2')
@section('lnb')
<li><a href="{{secure_url('myMarionetteStory?info=mycreate')}}">내가 만든 이야기</a></li>
<li><a href="{{secure_url('myMarionetteStory?info=purchase')}}">내가 구매한 이야기</a></li>
<li><a href="{{secure_url('myMarionetteStory?info=shortMoving')}}">개별 동작</a></li>
@endsection

@section('content')
@include('marionett.contentListModal')
<div class="row">
    <div class="col s12 m12 contentMenu">
        <a href="#makeBtn" class="btn writeContent right">컨텐츠만들기</a>
    </div>
    @foreach($content as $cont)
  
	<?php $link = '/myMarioShortMovingDetail?name='.$cont->cont_name; ?>

    <div class="col s2 m2 content">
        <div class="contentImg">
            <img src="{{$cont->cont_image}}" />
        </div>
        
        <div class="contentTitle center">
        <a href="{{$link}}" class="">
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
