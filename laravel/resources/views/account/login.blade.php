@extends('layouts.master2')
@section('lnb')
<li class="subheader"><a href=""></a></li>
@endsection

@section('content')
<div class="row container">
    <form action="{{secure_url('loginAction')}}" method="post" class="col s12">
        <div class="row">
            <div class="col s6 offset-s3 center">
                <h2 class="red-text">로그인</h2>
            </div>
            <div class="input-field col s6 offset-s3">
                <input type="text" id="user_id" name="user_id" value="admin"/>
                <label for="user_id">아이디</label>
            </div>
            <div class="input-field col s6 offset-s3">
                <input type="password" id="user_password" name="user_password" value="1234"/>
                <label for="user_password">비밀번호</label>
            </div>
            <div class="input-field col s6 offset-s3 center-align">
                <button class="btn waves-effect waves-light loginBtn" type="submit" name="action">로그인</button>
            </div>
        </div>
        {{csrf_field()}}
    </form>
    <div class="col s6 offset-s3 center">
        <span class="red-text"><a href="" class="green-text">아이디</a>/<a href="" class="green-text">비밀번호</a>를 모르겠어요!!!</span>
    </div>
    <div class="col s6 offset-s3 center">
        <a href="">회원가입</a>
    </div>
</div>
@endsection