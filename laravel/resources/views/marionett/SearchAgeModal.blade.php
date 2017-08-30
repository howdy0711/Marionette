<div id="PerAge" class="makeModal modal">
    <form action="{{secure_url('searchPerAge')}}" method="post" class="col s12" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="row">
                <div class="col s12 m12">
                    <h4>연령대별 조회</h4>
                    <hr>
                </div>
                <div class="col s5">
                    <div class="input-field">
                        <input type="number" id="contentTitle" name="startAge" class="center"/>
                        <label for="contentTitle">시작나이</label>
                    </div>
                </div>
                <div class="col s2">
                    <br>
                    <h3>&nbsp;&nbsp;~</h3>
                </div>
                <div class="col s5">
                    <div class="input-field">
                        <input type="text" id="contentTitle" name="endAge"/>
                        <label for="contentTitle">끝 나이</label>
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