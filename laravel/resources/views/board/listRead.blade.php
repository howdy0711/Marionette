@extends('layouts.master2')
@section('lnb')
<ul>
    
</ul>
@endsection





@section('content')
<div class="row container">
    <div class="col s12 contentHeader">
        <h5>{{$boardlist->list_title}}</h5>
        
        <hr>
    </div>
    <div class="col s12 contentMain">
        {{$boardlist->list_content}}
    </div>
    <div class="col s12 contentMenu right-align">
        <hr>
        @if($boardlist->list_name == $user_id)
            <a href="{{secure_url('board/listEdit', $list_no)}}" class="btn">수정</button></a>
            <a href="{{secure_url('board/listDelete', $list_no)}}" class="btn">삭제</button></a>
        @endif
        <a href="{{secure_url('board/listBoard', $boardlist->list_boardno)}}" class="btn">뒤로가기</button></a>
        
    </div>
    <div class="col s12 comment">
        <div class="commentHeader">
            
        </div>
    </div>
    <div class="col s12 commentWrite">
        <br>
        <label for="comment">댓글을 입력해주세요.</label><br>
        <textarea name="" id="comment" cols="30" rows="10" class="materialize-textarea"></textarea>
        
        <button class="btn right">작성</button>
    </div>
    
    
</div>
@endsection