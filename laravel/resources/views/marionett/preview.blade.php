
<html>
@extends('layouts.master')
@section('content')


@foreach($content as $cont)

<table  width = "60%" cellpadding="0" cellspacing="20" rules = none>
  <video src={{$cont->cont_video}} width="720" height="480" controls="controls" preload="none" </video>

 <tr>
    <td style="font-family:돋음; font-size:20">
       <div align="center"> <a style="color: black"href="/purchase?name={{$cont->cont_name}}">구매하기</a>
         <a style="color: black"href="" onclick="prevPage()">이전페이지</a></div>
 </tr>

</table>
@endforeach

<script>
function prevPage(){
  history.back();
}
</script>
@stop
