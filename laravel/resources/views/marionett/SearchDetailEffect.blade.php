<div id="SearchDetailEffect" class="makeModal modal">
    <div class="modal-content">
        <form action="{{secure_url('/searchEffectDetail')}}" method="post" class="col s12" enctype="multipart/form-data">
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
                        </div>
                        <div class="input-field col s6">
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
                            <br>
                        </div>
                        
                        <hr>
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
                        <h6>키워드입력</h6>
                    </div>
                <div class="input-field col s12">
                    <input type="text" id="contentExplain" name="keyword" value="어흥"/>
                    <label for="contentExplain">키워드</label>
                </div>
            </div>
        {{csrf_field()}}
        <div class="modal-footer">
            <!--<button class="modal-action modal-close waves-effect waves-green btn-flat ">검색</button>-->
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat " id="examS"> 검색</a>
        </div>
    </form>
    </div>
</div>