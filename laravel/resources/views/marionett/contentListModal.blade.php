<!-- Modal Trigger -->
<!--<a class="modal-trigger waves-effect waves-light btn" href="#modal1">Modal</a>-->

<!-- Modal Structure -->
<div id="makeBtn" class="makeModal modal modal-fixed-footer">
    <form action="{{secure_url('save_temporary')}}" method="post" class="col s12" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="row">
                <div class="col s12 m12">
                    <h4>컨텐츠 만들기</h4>
                    <hr>
                </div>
                <div class="col s12 m12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="contentTitle" name="contentTitle" value="TigerStory"/>
                            <label for="contentTitle">제목</label>
                        </div>
                        <div class="file-field input-field col s12">
                          <div class="btn">
                            <span>이미지</span>
                            <input type="file" name="i_file">
                          </div>
                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                          </div>
                        </div>
                        <div class="file-field input-field col s12">
                          <div class="btn">
                            <span>동영상</span>
                            <input type="file" name="v_file">
                          </div>
                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                          </div>
                        </div>
                        <div class="input-field col s2">
                            <h6>카테고리</h6>
                        </div>
                        <div class="input-field col s10">
                            <input type="radio" id="fairytale" name="contentCategory" value="fairytale" checked/>
                            <label for="fairytale">동화</label>
                            <input type="radio" id="childrenSong" name="contentCategory" value="childrenSong"/>
                            <label for="childrenSong">동요</label>
                            <input type="radio" id="english" name="contentCategory" value="english"/>
                            <label for="english">영어</label>
                            <input type="radio" id="education" name="contentCategory" value="education"/>
                            <label for="education">교육</label>
                            <input type="radio" id="dance" name="contentCategory" value="dance"/>
                            <label for="dance">댄스</label>
                        </div>
                    </div>
                    {{csrf_field()}}
                </div>
                <div class="input-field col s12">
                    <input type="text" id="contentExplain" name="contentExplain" value="여우는 어떻게 호랑이 이빨을 없앨까요?"/>
                    <label for="contentExplain">설명</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type='submit' class="modal-action modal-close waves-effect waves-green btn-flat ">작성</button>
        </div>
    </form>
</div>