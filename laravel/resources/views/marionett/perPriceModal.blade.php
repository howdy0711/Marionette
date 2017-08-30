<div id="perPrice" class="makeModal modal">
    <form action="{{secure_url('searchPerPrice')}}" method="post" class="col s12" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="row">
                <div class="col s12 m12">
                    <h4>가격대별 조회</h4>
                    <hr>
                </div>
                <div class="col s12 m12">
                    <div class="input-field col s5">
                        <input type="text" id="contentTitle" name="startPrice"/>
                        <label for="contentTitle">시작가격</label>
                    </div>
                    <div class="col s2">
                        <br>
                        <h3>&nbsp;&nbsp;~</h3>
                    </div>
                    <div class="input-field col s5">
                        <input type="text" id="contentTitle" name="endPrice"/>
                        <label for="contentTitle">끝 가격</label>
                    </div>
                    {{csrf_field()}}
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type='submit' class="modal-action modal-close waves-effect waves-green btn-flat ">검색</button>
        </div>
    </form>
</div>