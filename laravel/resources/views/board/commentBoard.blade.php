@extends('layouts.master2')
@section('lnb')
<ul>
    <li><a href="">{{$board}}</a></li>
</ul>
@endsection

@section('content')
<div class="row container">
    <div class="col s12">
        <table>
            <tbody>
                @foreach($boardlist as $boardlists)
                <tr>
                    <td>{{$boardlists->list_no}}</td>
                    <td class="center-align"><a href="{{secure_url('board/listRead', $boardlists->list_no)}}">{{$boardlists->list_title}}</a></td>
                    <td class="center-align">{{$boardlists->list_name}}</td>
                    <td class="center-align">{{$boardlists->list_date}}</td>
                    <td class="center-align">{{$boardlists->list_view}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <br>
        <center>
        
        <!--{{$start_page}}<br>-->
        <!--{{$end_page}}<br>-->
        <!--{{$boardlist->perPage()}}<br>-->
        <!--{{$total_page}}-->
        </center>
        
       
        
        
        
        
        
        <div class="boardMenu">
            <a href="{{secure_url('board/listWrite')}}" class="btn right">작성</a>
        </div>
    </div>
</div>
@endsection