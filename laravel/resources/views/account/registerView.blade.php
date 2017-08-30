@extends('layouts.master2')

@section('lnb')
@endsection

@section('content')
<div class="row container">
    <div class="col s12 red-text">
        <h4>회원가입</h4>
    </div>
    <form action="{{secure_url('account/registerAction')}}" method="post" class="col s12">
        <div class="row">
            <div class="input-field col s8 offset-s2">
                <input type="text" id="user_email" name="user_email"/>
                <label for="user_email">이메일</label>
            </div>
            <div class="input-field col s8 offset-s2">
                <input type="text" id="user_id" name="user_id"/>
                <label for="user_id">아이디</label>
            </div>
            <div class="input-field col s4 offset-s2">
                <input type="password" id="user_password" name="user_password"/>
                <label for="user_password">비밀번호</label>
            </div>
            <div class="input-field col s4">
                <input type="password" id="pw_chk" name="pw_chk"/>
                <label for="pw_chk">비밀번호 확인</label>
            </div>
            <div class="input-field col s4 offset-s2">
                <input type="text" id="user_name" name="user_name"/>
                <label for="user_name">이름</label>
            </div>
            <div class="input-field col s4">
                <input type="text" id="user_birth" name="user_birth"/>
                <label for="user_birth">생년월일</label>
            </div>
            <div class="input-field col s8 offset-s2">
                <input type="text" id="user_addr" name="user_addr"/>
                <label for="user_addr">주소</label>
            </div>
            <div class="input-field col s8 offset-s2">
                <input type="text" id="user_phone" name="user_phone"/>
                <label for="user_phone">휴대폰번호</label>
            </div>
            
            
            
            <div class="input-field col s8 offset-s2 center-align">
                <button class="btn waves-effect waves-light loginBtn" type="submit" name="action">회원가입</button>
            </div>
        </div>
        {{csrf_field()}}
    </form>
</div>
@endsection