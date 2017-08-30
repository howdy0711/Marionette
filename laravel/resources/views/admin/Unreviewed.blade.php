@extends('layouts.adminmaster')

@section('content')

<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="/">HOME</a></li>
                        <li><a class="menu-top-active" href="/adminmain">목록으로</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

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
        
        	<div class="book_menu">
		

        <form name = "cont_aprove" action = "/approval?name={{$content->cont_name}}" method="post">
        <input type="button" value="등록 승인"  data-toggle="modal" data-target="#myModal" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
        </div>
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title" id="myModalLabel">확인창</h4>
	      </div>
	      <div class="modal-body">
	        정말로 승인하시겠습니까??
	      </div>
	      <div class="modal-footer">
	      	<button onClick="cont_Aprove()">네!!!</button>
	        <button data-dismiss="modal">아니오 실수로 눌렀어요</button>
	      </div>
	    </div>
	  </div>
	</div>
        
    </div>
</div>
<script type="text/javascript">
	$('#book').turn({
        width:"100%",
        height:"600px",
        autoCenter:true,
        duration:1500,
    });
</script>
@endsection

