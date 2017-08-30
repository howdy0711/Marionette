<div id="SearchDetailBgm" class="makeModal modal">
    <div class="modal-content">
        <form action="{{secure_url('/searchBgmDetail')}}" method="post" class="col s12" enctype="multipart/form-data">
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
                    <div class="input-field col s6">
                            <p>
                              <input type="checkbox" id="sadness" name="category" value="sadness"/>
                              <label for="sadness">슬픔</label>
                            </p>
                            <p>
                              <input type="checkbox" id="impression" name="category" value="impression"/>
                              <label for="impression">감동</label>
                            </p>
                            <p>
                              <input type="checkbox" id="peace" name="category" value="peace"/>
                              <label for="peace">평화</label>
                            </p>
                            <p>
                              <input type="checkbox" id="hope" name="category" value="hope"/>
                              <label for="hope">희망</label>
                            </p>
                        </div>
                        <div class="input-field col s6">
                            <p>
                              <input type="checkbox" id="calm" name="category" value="calm"/>
                              <label for="calm">잔잔</label>
                            </p>
                            <p>
                              <input type="checkbox" id="still" name="category" value="still"/>
                              <label for="still">고요</label>
                            </p>
                            <p>
                              <input type="checkbox" id="dream" name="category" value="dream"/>
                              <label for="dream">몽환</label>
                            </p>
                            <p>
                              <input type="checkbox" id="light" name="category" value="light"/>
                              <label for="light">경쾌</label>
                            </p>
                            <br>
                        </div>
                        
                        <hr>
                        <div class="col s12 m12">
                        <h6>시간길이별조회</h6>
                        </div>
                        <div class="input-field col s5">
                            <input type="text" id="contentTitle" name="minTime"/>
                            <label for="contentTitle">최저시간</label>
                        </div>
                        <div class="col s2">
                            <br>
                            <h3>&nbsp;&nbsp;~</h3>
                        </div>
                        <div class="input-field col s5">
                            <input type="text" id="contentTitle" name="maxTime"/>
                            <label for="contentTitle">최고시간</label>
                        </div>
                        
                    <div class="col s12 m12">
                        <h6>키워드입력</h6>
                    </div>
                <div class="input-field col s12">
                    <input type="text" id="contentExplain" name="keyword"/>
                    <label for="contentExplain">키워드</label>
                </div>
            </div>
        {{csrf_field()}}
        <div class="modal-footer">
            <button type='submit' class="modal-action modal-close waves-effect waves-green btn-flat ">검색</button>
        </div>
    </form>
    </div>
</div>