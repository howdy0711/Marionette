<!-- Modal -->
<div class="modal fade" id="bgmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">상세검a색</h4>
            </div>
            <div class="modal-body">
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
                <br><br>
                <hr>
                <br>
                <div class="col s12 m12">
                <h6>시간길이별조회</h6>
                </div>
                <div class="input-field col s5">
                    <input type="text" id="contentTitle" name="minTime" value="0"/>
                    <label for="contentTitle">최저시간</label>
                </div>
                <div class="col s2">
                    <br>
                    <h3>&nbsp;&nbsp;~</h3>
                </div>
                <div class="input-field col s5">
                    <input type="text" id="contentTitle" name="maxTime" value="3"/>
                    <label for="contentTitle">최고시간</label>
                </div>
                <div class="col s12 m12">
                    <br>
                    <hr>
                    <h4>키워드입력</h4>
                </div>
                <div class="input-field col s12">
                    <input type="text" id="contentExplain" name="keyword"/>
                    <label for="contentExplain">키워드</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                <button type="button" class="btn btn-primary">찾기</button>
            </div>
        </div>
    </div>
</div>