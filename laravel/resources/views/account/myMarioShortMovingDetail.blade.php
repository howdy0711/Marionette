@extends('layouts.master2')

@section('assets')
<script src="{{secure_asset('js/turn.js')}}"></script>
@endsection

@section('lnb')

@endsection



@section('content')


        <hr>
        <h4 class="center">{{$content->cont_name}}</h4>
        <center>
        <img src="{{secure_asset('short_moving_img/cat1.jpg')}}"width="250px" height="350px"></img>
        <img src="{{secure_asset('short_moving_img/dog1.jpg')}}"width="250px" height="350px"></img>
        <img src="{{secure_asset('short_moving_img/tiger1.jpg')}}" width="250px" height="350px"></img>
        </center>

      <div class="col s12 contentMenu">
        <hr>
        <br>
        <a href="{{secure_url('/')}}" class="btn right">목록으로</a>
		
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
<br>
<br>
@endsection