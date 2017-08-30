@extends('layouts.master2')

@section('assets')
<script src="{{secure_asset('js/turn.js')}}"></script>
@endsection

@section('lnb')

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
            <div class="hard"><img src="{{$content->cont_image}}"></img></div>
            <div class="hard">
				<table  width = "60%" cellpadding="0" cellspacing="20" rules = none>
					<tr>
						<td style="font-family:돋음; font-size:15" height="16" align="center">
							<div align="center"><h2></h2></div>
						</td>
					</tr>
					<tr>
						<td style="font-family:돋음; font-size:15" height="16">
							<div align="left">카테고리:{{$content->cont_category}}</div>
						</td>
					</tr>
					<tr>
						<td style="font-family:돋음; font-size:15" height="16">
							<div align="left">가격:{{$content->cont_price}}</div>
						</td>
					</tr>
					<tr>
						<td style="font-family:돋음; font-size:15">
						<div align="left">제품설명:{{$content->cont_detail}}</div>
						</td>
					</tr>
				</table>
            </div>
            <div class=""><img src="{{secure_asset('image/fairytale0.jpg')}}"></img></div>
            <div class=""><img src="{{secure_asset('image/fairytale1-1.jpg')}}"></img></div>
            <div class=""><img src="{{secure_asset('image/fairytale1.jpg')}}"></img></div>
            <div class=""><img src="{{secure_asset('image/fairytail2.JPG')}}"></img></div>
            <div class=""><img src="{{secure_asset('image/fairytail2-1.JPG')}}"></img></div>


      
				
				<!--<div>-->
				<!--    <video width="100%" height="100%" controls="controls">-->
		  <!--          <source src="{{$content->cont_video}}" type="video/mp4" />-->
		  <!--          </video>-->
				<!--</div>-->
            <div class="hard"><img src="{{$content->cont_image}}"></img></div>
        </div>
        
    </div>
    <div class="col s12 contentMenu">
        <hr>
        <a href="{{secure_url('/')}}" class="btn right">목록으로</a>
        <a href="{{secure_url('/makingTool?'.'name='.$content->cont_name)}}" class="btn right">수정하기</a>
		
		<!-- Modal Trigger -->
		  <a class="waves-effect waves-light btn left" href="#down">다운로드</a>
		
		  <!-- Modal Structure -->
		  <div id="down" class="modal">
		    <div class="modal-content">
		      <h4>다운로드 확인창</h4>
		      <p>정말로 다운로드 하시겠습니까?</p>
		    </div>
		    <div class="modal-footer">
		    	<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">아니오</a>
		      	<a href="/download?name={{$content->cont_name}}" class="modal-action modal-close waves-effect waves-green btn-flat">네</a>
		    </div>
		  </div>
        
        @if($content->cont_info == "mycreate")
        
        <a class="waves-effect waves-light btn left" href="#sellApply">판매신청</a>
		
		  <!-- Modal Structure -->
		  <div id="sellApply" class="modal">
		    <div class="modal-content">
		      <h4>신청 확인창</h4>
		      <p>정말로 신청 하시겠습니까?</p>
		    </div>
		    <div class="modal-footer">
		    	<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">아니오</a>
		      	<a href="/sellApply?name={{$content->cont_name}}" class="modal-action modal-close waves-effect waves-green btn-flat">네</a>
		    </div>
		  </div>
        @endif
 		<a class="waves-effect waves-light btn left" href="#delProduct">상품삭제</a>
		
		  <!-- Modal Structure -->
		  <div id="delProduct" class="modal">
		    <div class="modal-content">
		      <h4>삭제 확인창</h4>
		      <p>정말로 삭제 하시겠습니까?</p>
		    </div>
		    <div class="modal-footer">
		    	<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">아니오</a>
		      	<a href="/createDel?name={{$content->cont_name}}" class="modal-action modal-close waves-effect waves-green btn-flat">네</a>
		    </div>
		  </div>
        
    </div>
</div>
@endsection