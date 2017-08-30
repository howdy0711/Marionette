@extends('layouts.adminmaster')
@section('content')

<!--컨텐츠 타이틀-->
@section('banner')
<section id="tiles">
		<header>
			<h1>사운드 파일 등록</h1>
		</header>
</section>
@endsection

<section>
<form action="/UploadSound" method="post" enctype="multipart/form-data">
    
    <h2>현재 등록된 사운드파일</h2>
    
	<table>
		 <tr>
			<td>효과음 파일</td>
		
			<td><input type="file" name="effect_file" id="fileToUpload"
                 multiple="multiple"></td>
                
		</tr>
		<tr>
				<td>효과음 이름 <input type='text' name="effectKoreanName"></td>
		</tr>
		<tr>
			<td>배경음악 파일</td>
			
			<td><input type="file" name="back_file" id="fileToUpload"
            
                 multiple="multiple"></td>

		</tr>
			<tr>
				<td>배경음 이름 <input type='text' name="backKoreanName"></td>
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