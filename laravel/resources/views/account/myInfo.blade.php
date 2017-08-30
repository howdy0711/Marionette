<!--내 정보 페이지-->
@extends('layouts.master2')
@section('content')

@section('banner')

@endsection

<section>
    <div class="table_size_m">
          @foreach($user as $value)
        <table>
            <tr>
                <td>아이디</td>
                <td>{{$value->user_id}}</td>
            </tr>
            <tr>
                <td>비밀번호</td>
                <td>[<a href="">변경</a>]</td>
            </tr>
            <tr>
                <td>이름</td>
                <td>{{$value->user_name}}</td>
            </tr>
        </table>   
        @endforeach
    </div>
</section>

@endsection