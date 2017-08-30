@extends('layouts.master2')
@section('content')
<div class="inner">
	<header>
		<h1>
			간단한 마우스 드래그로 <br>마리오네트 동작을 등록해보세요
		</h1>
			<?php $link = 'myMarioDetail?name='.$_GET['name']; ?>
			

			
		<br>
		
	</header>
	<style type="text/css">
			#actionBox{
				margin:10px;
				float:left;
				width:40%;
				height:auto;
				border:3px solid lightgreen;
				border-radius:20px;
				height:auto;

			}
			#define{
				margin:10px;
				float:right;
				width:40%;
				height:500px;
				border:3px solid pink;
				border-radius:20px;
			}
			#define li{
				display:block;
				width:100px;
				margin:auto;
			}

	</style>
	<section id="s">
		</style>
		<article id="a">
			<div id="actionBox">
				<h2>동작정의</h2>
				<ul id="myTab" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a data-target="#action" id="action-tab" role="tab" data-toggle="tab" aria-controls="action" aria-expanded="true">
						동작
						</a>
					</li>
					<li role="presentation" class="">
						<a data-target="#sound" role="tab" id="sound-tab" data-toggle="tab" aria-controls="sound" aria-expanded="false">
						사운드
						</a>
					</li>
					<li role="presentation" class="">
						<a data-target="#delay" role="tab" id="delay-tab" data-toggle="tab" aria-controls="delay" aria-expanded="false">
						지연
						</a>
					</li>
				</ul>
				<div id="tab-content" class="tab-content">
					<!--동작 정의리스트 div-->
					<div role="tabpanel" class="tab-pane fade active in" id="action">
						<div id="actionList">
							<ul>
								<li class="button" id="hello" draggable="true">인사</li>
								<li class="button" id="handshake" draggable="true">악수</li>
								<li class="button" id="handup" draggable="true">한손들기</li>
								<li class="button" id="footup" draggable="true">양발들기</li>
							</ul>
						</div>
					</div>

					<!--사운드 정의리스트 div-->
					<div role="tabpanel" class="tab-pane fade" id="sound">
						<ul>
							<li class="button" draggable="true">울음소리</li>
							<li class="button" draggable="true">직접녹음</li>
						</ul>
					</div>

					<div role="tabpanel" class="tab-pane fade" id="delay">
						<ul>
							<li class="button" id="delay1" draggable="true">1초지연</li>
						</ul>
					</div>

				</div>
			</div>
				<div id="define">

				</div>

		</article>
	</section>

</div>

			<table>
				<tr>
					<td style = "text-align: right;" >
			<a href="" class="button big">저장</a>		
			<a href="{{$link}}" class="button big">다음</a>
					</td>
			
				</tr>
			</table>

<script type="text/javascript">
	$("#myTab a").click(function(e){
		e.preventDefault();
		$(this).tab('show');
	});

	var actionList = [];
	var actionID = [];
	$(function(){
		$("#define").sortable({
		revert:true,
		receive:function(event, ui){
			// idx = $("#define").sortable("toArray").length-1;
			// actionList[idx] = ui.item.context.innerText;
			// actionID[idx] = ui.item.context.id;
			// console.log(actionList);
			// console.log(actionID);
			var result = $('#define').sortable('toArray');
		    console.log( 'value:' + result );
		    console.log( 'first value:' + result[0] );
		}

	});
	$(".button").draggable({
		connectToSortable:"#define",
		helper:"clone",
		revert:"invalid",
	});
	$("ul, li").disableSelection();



	// 동작 삭제
	$trash = $('#actionBox');
	$('#actionBox').droppable({
      accept: "#define > li",
      classes: {
        "ui-droppable-active": "ui-state-highlight"
      },
      drop: function( event, ui ) {
        deleteAction( ui.draggable );
      }
    });

	function deleteAction( $item ) {
      $item.fadeOut(function() {
        var $list = $( "ul", $trash ).length ?
          $( "ul", $trash ) :
          $( "<ul class='gallery ui-helper-reset'/>" ).appendTo( $trash );
		console.log($list);
        $item.find( "a.ui-icon-trash" ).remove();

      });
    }


	});

</script>
@endsection
