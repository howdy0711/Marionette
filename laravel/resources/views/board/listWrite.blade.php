@extends('layouts.master2')
@section('lnb')
<script src="{{secure_asset('js/board.js')}}"></script>
@endsection
@section('lnb')
<ul>
    <li><a href="">Q&amp;A</a></li>
</ul>
@endsection

@section('content')
<div class="row container">
    <form action="{{secure_url('board/listInsert')}}" method="post" class="col s12">
        <div class="row">
            <div class="input-field col s8 offset-s2">
                <select name="list_boardno">
                    <option value="" disabled selected>카테고리를 선택해주세요</option>
                    <option value="1">자유게시판</option>
                    <option value="2">학부모</option>
                    <option value="3">어린이</option>
                    <option value="4">일반</option>
                </select>
                <label>Materialize Select</label>
            </div>
            <div class="input-field col s8 offset-s2">
                <input type="text" id="list_title" name="list_title"/>
                <label for="list_title">제목</label>
            </div>
            <div class="input-field col s8 offset-s2">
                <label for="list_content">내용을 입력해주세요.</label><br>
                <textarea name="list_content" id="list_content" cols="30" rows="50" class="materialize-textarea"></textarea>
            </div>
            <div class="file-field input-field col s8 offset-s2">
              <div class="btn">
                <span>File</span>
                <input type="file" name="list_file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
            <div class="input-field col s8 offset-s2 center-align">
                <button class="btn waves-effect waves-light loginBtn" type="submit" name="action">작성</button>
            </div>
        </div>
        
        {{csrf_field()}}
    </form>
    
</div>
@endsection