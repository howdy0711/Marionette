<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <p>
                        <input type="checkbox" id="female" name="effectCategory" value=""/>
                        <label for="female">박수</label>
                    </p>
                    <p>
                        <input type="checkbox" id="nature" name="effectCategory" value=""/>
                        <label for="nature">댄스</label>
                    </p>
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