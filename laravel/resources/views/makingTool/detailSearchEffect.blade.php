<!-- Modal -->
<div class="modal fade" id="effectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">상세검색</h4>
            </div>
            <div class="modal-body">
                <div class="input-field col s6">
                    <p>
                      <input type="checkbox" id="children" name="effectCategory" value=""/>
                      <label for="children">사람관련(아이)</label>
                    </p>
                    <p>
                      <input type="checkbox" id="oldguy" name="effectCategory" value=""/>
                      <label for="oldguy">사람관련(노인)</label>
                    </p>
                    <p>
                      <input type="checkbox" id="male" name="effectCategory" value=""/>
                      <label for="male">사람관련(성인남자)</label>
                    </p>
                    <p>
                      <input type="checkbox" id="female" name="effectCategory" value=""/>
                      <label for="female">사람관련(성인여자)</label>
                    </p>
                    <p>
                      <input type="checkbox" id="nature" name="effectCategory" value=""/>
                      <label for="nature">자연</label>
                    </p>
                    <p>
                      <input type="checkbox" id="animalPo" name="effectCategory" value="" checked/>
                      <label for="animalPo">동물소리 (포유류)</label>
                    </p>
                    <p>
                      <input type="checkbox" id="animalPa" name="effectCategory" value=""/>
                      <label for="animalPa">동물소리(파충류)</label>
                    </p>
                    <p>
                      <input type="checkbox" id="animalJo" name="effectCategory" value=""/>
                      <label for="animalJo">동물소리(조류)</label>
                    </p>
                    <p>
                      <input type="checkbox" id="houseTools" name="effectCategory" value=""/>
                      <label for="houseTools">집안도구 관련</label>
                    </p>
                    <p>
                      <input type="checkbox" id="car" name="effectCategory" value=""/>
                      <label for="car">자동차 효과음</label>
                    </p>
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