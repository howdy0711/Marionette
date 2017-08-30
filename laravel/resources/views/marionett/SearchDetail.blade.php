
<div id="SearchDetail" class="makeModal modal">
    <div class="modal-content">
        <form action="{{secure_url('searchDetail')}}" method="post" class="col s12" enctype="multipart/form-data">
            <div class="row">
                <div class="col s12 m12">
                    <h4>상세검색</h4>
                    <hr>
                </div>
                <br>
                <div class="col s12 m12">
                    <br>
                    <h6>카테고리</h6>
                </div>
                        <div class="input-field col s12">
                            <input type="radio" id="fairytale1" name="category" value="fairytale" checked/>
                            <label for="fairytale1">동화</label>
                            <input type="radio" id="childrenSong1" name="category" value="childrenSong"/>
                            <label for="childrenSong1">동요</label>
                            <input type="radio" id="english1" name="category" value="english"/>
                            <label for="english1">영어</label>
                            <input type="radio" id="dance1" name="category" value="dance"/>
                            <label for="dance1">댄스</label>
                            <input type="radio" id="education1" name="category" value="education"/>
                            <label for="education1">교육</label>
                            <br><br>
                        </div>
                        <hr>
                        <div class="col s12 m12">
                        <h6>가격대입력</h6>
                        </div>
                        <div class="input-field col s5">
                            <input type="text" id="contentTitle" name="startPrice"  value="0"/>
                            <label for="contentTitle">최저가격</label>
                        </div>
                        <div class="col s2">
                            <br>
                            <h3>&nbsp;&nbsp;~</h3>
                        </div>
                        <div class="input-field col s5">
                            <input type="text" id="contentTitle" name="endPrice"  value="10000"/>
                            <label for="contentTitle">최고가격</label>
                        </div>
                        
                        <!--ㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁ-->
                        <div class="col s12 m12">
                        <h6>연령대입력</h6>
                        </div>
                        <div class="input-field col s5">
                            <input type="text" id="contentTitle" name="startAge" value="1"/>
                            <label for="contentTitle" >최소연령</label>
                        </div>
                        <div class="col s2">
                            <br>
                            <h3>&nbsp;&nbsp;~</h3>
                        </div>
                        <div class="input-field col s5">
                            <input type="text" id="contentTitle" name="endAge" value="5"/>
                            <label for="contentTitle" >최대연령</label>
                        </div>
                        <!--ㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁ-->
                        
                    {{csrf_field()}}
                    <div class="col s12 m12">
                        <h6>키워드입력</h6>
                    </div>
                <div class="input-field col s12">
                    <input type="text" id="contentExplain" name="keyword"  value="이빨빠진호랑이"/>
                    <label for="contentExplain">키워드</label>
                </div>
            </div>
        
        <div class="modal-footer">
            <button type='submit' class="modal-action modal-close waves-effect waves-green btn-flat ">검색</button>
        </div>
    </form>
    </div>
</div>