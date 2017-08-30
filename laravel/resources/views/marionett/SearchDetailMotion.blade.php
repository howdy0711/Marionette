<div id="SearchDetailMotion" class="makeModal modal">
    <div class="modal-content">
        <form action="{{secure_url('/searchMotionDetail')}}" method="post" class="col s12" enctype="multipart/form-data">
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
                              <input type="checkbox" id="children" name="effectCategory" value=""/>
                              <label for="children">인사</label>
                            </p>
                            <p>
                              <input type="checkbox" id="oldguy" name="effectCategory" value=""/>
                              <label for="oldguy">걷기</label>
                            </p>
                            <p>
                              <input type="checkbox" id="male" name="effectCategory" value=""/>
                              <label for="male">방향지시</label>
                            </p>
                    </div>
                    <div class="input-field col s6">
                        <p>
                          <input type="checkbox" id="female" name="effectCategory" value=""/>
                          <label for="female">박수</label>
                        </p>
                        <p>
                          <input type="checkbox" id="nature" name="effectCategory" value=""/>
                          <label for="nature">댄스</label>
                        </p>
                    </div>
                        
                      <br>
                      <br>
                        
                    <div class="col s12 m12">
                      <br>
                        <hr>
                        <h6>키워드입력</h6>
                    </div>
                <div class="input-field col s12">
                    <input type="text" id="contentExplain" name="keyword"/>
                    <label for="contentExplain">키워드</label>
                </div>
            </div>
        {{csrf_field()}}
        <div class="modal-footer">
            <button type='submit' class="modal-action modal-close waves-effect waves-green btn-flat">검색</button>
        </div>
    </form>
    </div>
</div>