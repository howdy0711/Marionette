<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="button" data-dismiss="modal" style="float:right;">X</button>
    <h4 class="modal-title" id="myModalLabel">이야기 만들기</h4>
  </div>
  <div class="modal-body">
    <form action="/createMarioAction" method="post" enctype="multipart/form-data" id="createPopup">
	<table>
	    <tr>
			<td>제목</td>
			<td><input type="text" name="cont_name"></td>
		</tr>
		<tr>
			<td>컨텐츠분류</td>
			<td>
				<input type="radio" name="cont_category" value="fairytale" id="fairytale"><label for="fairytale"><img src="{{URL::asset('img/baseFairytale.png')}}" style="width: 150px; height: 200px; "></img></label>
				<input type="radio" name="cont_category" value="childrenSong" id="children_song"><label for="children_song"><img src="{{URL::asset('img/basChildren.png')}}"  style="width: 150px; height: 200px; "></img></label>
				<input type="radio" name="cont_category" value="English" id="english"><label for="english"><img src="{{URL::asset('img/baseEnglish.png')}}" style="width: 150px; height: 200px; "></img></label>
			</td>
		</tr>
		
		
	<tr>
			<td>간단한설명</td>
			<td><input type="text" name="cont_detail" ></td>
		</tr>

	
	</table>
	{{ csrf_field() }}
</form>
  </div>
  <div class="modal-footer">
    	<button id="ajaxSubmit" data-dismiss="modal">등록</button>
		<input type="reset" value="reset">
  </div>
</div>
<script>
	$("#ajaxSubmit").click(function(){
		$.ajax({
			type:"POST",
			async:true,
			url:"/insertMarioModal",
			dataType:"html",
			data:$("#createPopup").serialize(),
			success:function(){
				console.log("Success");
			},
			complete:function(){
				// $("#reloadArea");
				$.ajax({
					type:"GET",
					async:true,
					url:"/getMyContentList",
					success:function(data){
						console.log(JSON.parse(data));
						data = JSON.parse(data);
						var idx = data.length-1;
						console.log(idx);
						var display = "<article class='style1'>";
						display += "<span class='image'>";
						display += "<img src='"+data[idx].cont_image+"' alt='' />";
						display += "</span>";
						display += "<a href='/makeMoving?name="+data[idx].cont_name+"'>";
						display += "<h2>"+data[idx].cont_category+"</h2>";
						display += "<div class='content'>";
						display += "<p>"+data[idx].cont_name+"</p></div></a></article>";
						$("#reloadArea>article").first().before(display);
					}
					
				})
			}
			
			
		});
	});

</script>

