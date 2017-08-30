<!--Side Nav-->
<ul class="side-nav" id="sideNav">
    <li>
        <div class="userView">
            <div class="background">
                <img src="{{secure_asset('image/office.jpg')}}">
            </div>
            <a href="#!user"><img class="circle" src="{{secure_asset('image/profile.png')}}"></a>
            @if(!Session::has('user_name'))
            <a href="{{secure_url('login')}}"><span class="white-text name">로그인</span></a>
            <a href="{{secure_url('registerView')}}"><span class="white-text email">회원가입</span></a>
            @else
            <a href=""><span class="white-text name">{{(Session::get('user_name'))}}</span></a>
            @endif
        </div>
    </li>
    <li><a href="{{secure_url('/')}}"><i class="material-icons">home</i>홈으로</a></li>
    <li><a href="{{secure_url('intro')}}">소개</a></li>
    @if(Session::has('user_name'))
    <li><a href="{{secure_url('myInfo')}}">내 정보</a></li>
    <li><a href="{{secure_url('myMarionetteStory')}}">내가 만든 이야기</a></li>
    @endif
    <li><div class="divider"></div></li>
    <li><a class="subheader">컨텐츠</a></li>
    
    <!--DropDown-->
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a href="#!" class="collapsible-header"><i class="material-icons">arrow_drop_down</i>이야기</a>
                <div class="collapsible-body">
                    <ul>
                        <li>
                            <a href="{{secure_url('/')}}">전체보기</a>
                            <a href="{{secure_url('product?category=fairytale')}}">동화</a>
                            <a href="{{secure_url('product?category=childrenSong')}}">동요</a>
                            <a href="{{secure_url('product?category=English')}}">영어</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    <!--DropDown-->
    <li><div class="divider"></div></li>
    <li><a class="subheader">게시판</a></li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a href="#!" class="collapsible-header"><i class="material-icons">arrow_drop_down</i>게시판목록</a>
                <div class="collapsible-body">
                    <ul>
                        <li>
                        
                            <a class="waves-effect" href="{{secure_url('board/listBoard/1')}}">자유게시판</a>
                            <a class="waves-effect" href="{{secure_url('board/listBoard/2')}}">학부모</a>
                            <a class="waves-effect" href="{{secure_url('board/listBoard/3')}}">어린이</a>
                            <a class="waves-effect" href="{{secure_url('board/listBoard/4')}}">일반</a>
                            
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    
    
    @if((Session::get('user_id') == 'admin'))
    <li><a href="{{secure_url('adminmain')}}">관리자페이지</a></li>
    @endif
    
</ul>
<!--Side Nav End-->