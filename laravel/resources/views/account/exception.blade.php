
<html>
@extends('layouts.master2')
@section('content')
<div class="inner">
    
    <br><br><br>
        @if($num == 0 )
    <h1 align = center>아이디 오류 <br><br><br><br>   </h1>   
        @endif

        @if($num == 1)
    <h1 align = center>비밀번호 오류 <br><br><br><br> </h1>   
        @endif
        
        
    <h1 align = center> <a href = "/login" style="color: black"> 로그인 페이지로 돌아가기  </a></h1>
      <br>


@stop


