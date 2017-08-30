@extends('layouts.master2')
@section('content')

<!--컨텐츠 타이틀-->
@section('banner')

@endsection

<section>
<form action="/createMarioAction" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>컨텐츠분류</td>
			<td>
				<input type="radio" name="cont_category" value="fairytale" id="fairytale"><label for="fairytale">동화</label>
				<input type="radio" name="cont_category" value="childrenSong" id="children_song"><label for="children_song">동요</label>
				<input type="radio" name="cont_category" value="English" id="english"><label for="english">영어</label>
			</td>
		</tr>
		<tr>
			<td>제목</td>
			<td><input type="text" name="cont_name"></td>
		</tr>
		<tr>
			<td>컨텐츠 설명</td>
			<td><input type="text" name="cont_detail"></td>
		</tr>
		<tr>
		 <tr>
			<td>마리오사진</td>
			<td><input type="file" name="cont_image" id="fileToUpload"
                 multiple="multiple"></td>
		</tr>
		<tr>
			<td>미리보기</td>
			<td><input type="file" name="cont_video" id="fileToUpload"
                 multiple="multiple"></td>
		</tr>
			<td>가격</td>
			<td><input type="text" name="cont_price" ></td>
		</tr>

		<tr>
			<td><a href="/makeMoving">움직임등록</a></td>
			<td><input type="file"></td>
		</tr>


	</table>
	<div class="book_menu">
		<input type="submit" value="등록">
		<input type="reset" value="reset">
	</div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
</section>
@endsection