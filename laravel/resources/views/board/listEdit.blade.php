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
    <form action="{{secure_url('board/listUpdate')}}" method="post" class="col s12">
        <div class="row">
            <div class="input-field col s8 offset-s2">
                <input type="text" id="list_title" name="list_title" value="{{$boardlist->list_title}}"/>
                <label for="list_title">제목</label>
            </div>
            <div class="input-field col s8 offset-s2">
                <label for="list_content">내용을 입력해주세요.</label><br>
                <textarea name="list_content" id="list_content" cols="30" rows="50" class="materialize-textarea">{{$boardlist->list_content}}</textarea>
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
        <input type="hidden" id="list_no" name="list_no" value="{{$boardlist->list_no}}"/>
        <input type="hidden" id="list_boardno" name="list_boardno" value="{{$boardlist->list_boardno}}"/>
        {{csrf_field()}}
    </form>
    
</div>
@endsection